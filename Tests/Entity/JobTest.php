<?php

namespace Loevgaard\CronBundle\Tests\Entity;

use Cron\CronExpression;
use Loevgaard\CronBundle\Entity\Job;
use PHPUnit\Framework\TestCase;

class JobTest extends TestCase
{
    public function testGettersSetters()
    {
        $job = new Job();

        $job->setId(1);
        $this->assertSame(1, $job->getId());

        $job->setPid(100);
        $this->assertSame(100, $job->getPid());

        $job->setDescription('desc');
        $this->assertSame('desc', $job->getDescription());

        $job->setArguments('args');
        $this->assertSame('args', $job->getArguments());

        $job->setIdleTimeout(200);
        $this->assertSame(200, $job->getIdleTimeout());

        $job->setTimeout(300);
        $this->assertSame(300, $job->getTimeout());

        $job->setName('name');
        $this->assertSame('name', $job->getName());

        $job->setCommand('command');
        $this->assertSame('command', $job->getCommand());

        $cronExpression = CronExpression::factory('@daily');
        $job->setCronExpression($cronExpression);
        $this->assertSame($cronExpression, $job->getCronExpression());

        $job->setLog('log');
        $this->assertSame('log', $job->getLog());

        $job->setErrorLog('error log');
        $this->assertSame('error log', $job->getErrorLog());

        $job->setEnabled(true);
        $this->assertSame(true, $job->isEnabled());

        $job->setSingleProcess(true);
        $this->assertSame(true, $job->isSingleProcess());
    }
}
