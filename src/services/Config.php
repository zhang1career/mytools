<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 30/08/2017
 * Time: 3:39 PM
 */

namespace phplab\commands\services;

use phplab\commands\components\Singleton;

class Config extends Singleton
{
    /**
     * config content
     * @var
     */
    protected static $config;

    /**
     * Config constructor.
     * @param $config[]
     */
    protected function __construct($config)
    {
        self::$config = $config;
    }

    /**
     * @return mixed
     */
    public static function getValue()
    {
        $class = get_called_class();

        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new $class(require(__DIR__ . '/../config/config.php'));
        }

        return self::$config;
    }
}
