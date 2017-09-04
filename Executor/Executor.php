<?php

namespace Loevgaard\CronBundle\Executor;

use Loevgaard\CronBundle\Model\JobInterface;
use Symfony\Component\Process\Process;

class Executor
{
    /**
     * @var JobInterface[]
     */
    protected $jobs;

    /**
     * @var Process[]
     */
    protected $processes;

    /**
     * @param JobInterface[] $jobs
     */
    public function __construct(array $jobs)
    {
        $this->jobs = $jobs;
        $this->processes = [];
    }

    public function run()
    {
        foreach ($this->jobs as $job) {
            $p = new Process($job->getCommand(), null, null, null, null);

            if($job->getIdleTimeout()) {
                $p->setIdleTimeout($job->getIdleTimeout());
            }

            if($job->getTimeout()) {
                $p->setIdleTimeout($job->getTimeout());
            }

            if($job->getArguments()) {
                $job->setArguments($job->getArguments());
            }

            $p->start();

            $this->processes[] = $p;
        }
    }

    /**
     * Returns true if any of the processes are still running
     *
     * @return bool
     */
    public function isRunning() : bool
    {
        foreach ($this->processes as $process) {
            if($process->isRunning()) {
                return true;
            }
        }

        return false;
    }
}