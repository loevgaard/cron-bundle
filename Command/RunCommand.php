<?php

namespace Loevgaard\CronBundle\Command;

use Doctrine\ORM\EntityManager;
use Loevgaard\CronBundle\Executor\Executor;
use Loevgaard\CronBundle\Entity\JobInterface;
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
        /** @var EntityManager $entityManager */
        $entityManager = $this->getContainer()->get('doctrine')->getManager();

        /** @var JobInterface[] $jobs */
        $jobs = $entityManager
            ->getRepository('LoevgaardCronBundle:Job')
            ->getEnabledJobs()
        ;

        $resolver = new Resolver($jobs);
        $jobs = $resolver->resolve();

        $executor = new Executor($jobs);
        $executor->run();

        $entityManager->flush();

        while($executor->isRunning()) {

        }
    }
}