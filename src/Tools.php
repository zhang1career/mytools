<?php

namespace phplab\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Tools extends Command
{
    /**
     * name
     * @var string
     */
    static $NAME = 'undefined';
    /**
     * description
     * @var string
     */
    static $DESCRIPTION = 'undefined';
    /**
     * arguments
     * @var array
     */
    static $ARGUMENTS = [];

    /** @var $args, argument values */
    protected $args;
    /** @var string $namepath */
    protected $namepath;

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->namepath = __NAMESPACE__;
    }

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
        $action = $this->namepath . '\\' . UCFirst(strtolower($this->getArgument('action')));
        /** @var CommandInterface $obj */
        $obj = new $action();
        $value = $obj->run();
        $output->writeln("<info>$value</info>");

        return 0;
    }

    /**
     * get argument value by name
     * @param $name
     * @return null
     */
    protected function getArgument($name)
    {
        return isset($this->args[$name]) ? $this->args[$name] : null;
    }

    /**
     * configure command
     */
    protected function configure()
    {
        $this->setName(static::$NAME)
            ->setDescription(static::$DESCRIPTION);

        foreach (static::$ARGUMENTS as $_v) {
            $this->addArgument($_v['name'], $_v['mode'], $_v['description']);
        }
    }
}
