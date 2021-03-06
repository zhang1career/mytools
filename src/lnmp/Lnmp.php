<?php

namespace phplab\commands\lnmp;

use phplab\commands\tools;
use Symfony\Component\Console\Input\InputArgument;

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
            'description' => 'Action the lnmp does, i.e. start, stop, restart',
        ],
    ];

    /**
     * Lnmp constructor.
     * @param null $name
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->namepath = __NAMESPACE__;
    }
}
