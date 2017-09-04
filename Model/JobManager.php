<?php

namespace Loevgaard\CronBundle\Model;

/**
 * @method JobInterface create()
 * @method delete(JobInterface $obj)
 * @method update(JobInterface $obj, $flush = true)
 */
class JobManager extends Manager
{
    /**
     * @return JobInterface[]
     */
    public function getEnabledJobs() {
        return $this->getRepository()->findBy([
            'enabled' => true
        ]);
    }
}
