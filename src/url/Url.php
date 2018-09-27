<?php

namespace phplab\commands\url;

use phplab\commands\tools;
use Symfony\Component\Console\Input\InputArgument;

class Url extends Tools
{
    /**
     * full name
     * @var string
     */
    static $NAME = 'url';
    /**
     * description
     * @var string
     */
    static $DESCRIPTION = 'URL Toolkits';
    /**
     * arguments
     * @var array
     */
    static $ARGUMENTS = [
        [
            'name' => 'action',
            'mode' => InputArgument::REQUIRED,
            'description' => 'Action the url toolkits do, i.e. encode, decode',
        ],
        [
            'name' => 'value',
            'mode' => InputArgument::REQUIRED,
            'description' => 'value to be encoded to url, or decoded to array',
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
