<?php

namespace Loevgaard\CronBundle\Command;

use Loevgaard\CronBundle\Executor\Executor;
use Loevgaard\CronBundle\Model\JobInterface;
use Loevgaard\CronBundle\Resolver\Resolver;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('loevgaard:cron:run')
            ->setDescription('Runs scheduled cron jobs')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var JobInterface[] $jobs */
        $jobs = $this->getContainer()->get('loevgaard_cron.job_manager')->getEnabledJobs();

        $resolver = new Resolver($jobs);

        $jobs = $resolver->resolve();

        $executor = new Executor($jobs);

        $executor->run();

        while($executor->isRunning()) {

        }
    }
}