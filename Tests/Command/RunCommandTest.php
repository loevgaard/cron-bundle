<?php

namespace Loevgaard\CronBundle\Tests\Command;

use Loevgaard\CronBundle\Command\RunCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class RunCommandTest extends TestCase
{
    public function testExecute()
    {
        /*
        $command = new RunCommand();

        $application = new Application();
        $application->setAutoExit(false);
        $application->add($command);

        $command = $application->find('loevgaard:cron:run');
        $commandTester = new CommandTester($command);
        $exitCode = $commandTester->execute([
            'command' => $command->getName(),
        ]);

        $this->assertSame(0, $exitCode, 'Returns 0 in case of success');
        */
    }
}
