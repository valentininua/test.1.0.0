<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\News;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class CreateNewsCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('app:create-news')
            ->setHelp("add news")
            ->setDescription('the test task')
            // Arguments
            ->addArgument('header', InputArgument::REQUIRED, 'The header')
            ->addArgument('text', InputArgument::REQUIRED, 'The text')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Add news',
            '============',
            '',// Empty line
        ]);

        $header = $input->getArgument('header');
        $text = $input->getArgument('text');

        $output->writeln("header> : ".$text);
        $output->writeln("text> :".$text);

        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getEntityManager();

        $news = new News();
        $news->setHeader($header);
        $news->setText($text);
        $em ->persist($news);
        $em ->flush();
    }

}
