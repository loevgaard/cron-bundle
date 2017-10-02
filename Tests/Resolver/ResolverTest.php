<?php

namespace Loevgaard\CronBundle\Tests\Resolver;

use Cron\CronExpression;
use Loevgaard\CronBundle\Entity\Job;
use Loevgaard\CronBundle\Resolver\Resolver;
use PHPUnit\Framework\TestCase;

class ResolverTest extends TestCase
{
    public function testResolve()
    {
        $job = new Job();
        $job->setCronExpression(CronExpression::factory('@daily'));

        $resolver = new Resolver();
        $jobs = $resolver->resolve([$job]);

        $this->assertTrue(is_array($jobs));
    }
}
