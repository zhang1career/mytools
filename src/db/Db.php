<?php

namespace phplab\commands\db;

use phplab\commands\tools;
use Symfony\Component\Console\Input\InputArgument;

class Db extends Tools
{
    /**
     * full name
     * @var string
     */
    static $NAME = 'db';
    /**
     * description
     * @var string
     */
    static $DESCRIPTION = 'Database services.';
    /**
     * arguments
     * @var array
     */
    static $ARGUMENTS = [
        [
            'name' => 'action',
            'mode' => InputArgument::REQUIRED,
            'description' => 'Action the db to do, i.e. dump',
        ],
    ];

    /**
     * Db constructor.
     * @param null $name
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->namepath = __NAMESPACE__;
    }
}
