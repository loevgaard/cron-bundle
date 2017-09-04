<?php

namespace Loevgaard\CronBundle\Resolver;


use Loevgaard\CronBundle\Model\JobInterface;

class Resolver
{
    /**
     * @var JobInterface[]
     */
    protected $jobs;

    /**
     * @param JobInterface[] $jobs
     */
    public function __construct(array $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * @return JobInterface[]
     */
    public function resolve() : array
    {
        return array_filter($this->jobs, function(JobInterface $job) {
            return $job->getCronExpression()->isDue();
        });
    }
}