<?php

namespace App\Lnmp;

use App\Tools;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Lnmp extends Tools
{
    /**
     * full name
     * @var string
     */
    static $NAME = 'lnmp';
    /**
     * description
     * @var string
     */
    static $DESCRIPTION = 'Start LNMP services.';
    /**
     * arguments
     * @var array
     */
    static $ARGUMENTS = [
        [
            'name' => 'action',
            'mode' => InputArgument::REQUIRED,
            'description' => 'Action the lnmp to do, i.e. start, stop, restart',
        ],
    ];

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        // get argument values
        $this->args = $input->getArguments();

        // get action
        $action = __NAMESPACE__.'\\'.UCFirst(strtolower($this->getArgument('action')));
        
        $obj = new $action();
        $value = $obj->run();
        $output->writeln("<info>$value</info>");

        return 0;
    }
}
