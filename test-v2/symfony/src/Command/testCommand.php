<?php


namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class testCommand extends Command
{
    protected static $defaultName = 'app:test-cmd';

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        echo "test command";
        return 0;
    }
}