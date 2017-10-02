<?php

namespace Loevgaard\CronBundle\Executor;

use Loevgaard\CronBundle\Entity\JobInterface;
use Symfony\Component\Process\Process;

class Executor
{
    /**
     * @var Process[]
     */
    protected $processes;

    public function __construct()
    {
        $this->processes = [];
    }

    /**
     * @param JobInterface[] $jobs
     */
    public function run(array $jobs)
    {
        foreach ($jobs as $job) {
            $p = new Process($job->getCommand().($job->getArguments() ? ' '.$job->getArguments() : ''));

            if ($job->getIdleTimeout()) {
                $p->setIdleTimeout($job->getIdleTimeout());
            }

            if ($job->getTimeout()) {
                $p->setIdleTimeout($job->getTimeout());
            }

            $p->start();

            $job->setPid($p->getPid());

            $this->processes[] = $p;
        }
    }

    /**
     * Returns true if any of the processes are still running.
     *
     * @return bool
     */
    public function isRunning(): bool
    {
        foreach ($this->processes as $process) {
            if ($process->isRunning()) {
                return true;
            }
        }

        return false;
    }
}
