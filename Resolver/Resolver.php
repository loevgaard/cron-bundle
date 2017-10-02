<?php

namespace Loevgaard\CronBundle\Resolver;

use Loevgaard\CronBundle\Entity\JobInterface;

class Resolver
{
    /**
     * @param JobInterface[] $jobs
     *
     * @return JobInterface[]
     */
    public function resolve(array $jobs): array
    {
        return array_filter($jobs, function (JobInterface $job) {
            return $job->getCronExpression()->isDue();
        });
    }
}
