<?php

namespace Loevgaard\CronBundle\Entity;

use Doctrine\ORM\EntityRepository;

class JobRepository extends EntityRepository
{
    /**
     * @return JobInterface[]
     */
    public function getEnabledJobs()
    {
        return $this->findBy([
           'enabled' => true,
        ]);
    }
}
