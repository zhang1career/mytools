<?php

namespace app;

use Symfony\Component\Console\Command\Command;

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

    /**
     * argument values
     * @var
     */
    protected $args;

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

    /**
     * get argument value by name
     * @param $name
     * @return null
     */
    protected function getArgument($name)
    {
        return isset($this->args[$name]) ? $this->args[$name] : null;
    }
}
