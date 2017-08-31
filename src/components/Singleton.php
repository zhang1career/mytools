<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 30/08/2017
 * Time: 3:39 PM
 */

namespace app\components;

class Singleton
{
    /**
     * singleton
     * @var
     */
    protected static $instance;

    /**
     * constructor
     */
    protected function __construct()
    {
    }

    /**
     * clone
     */
    final private function __clone()
    {
    }

    /**
     * get instance
     * @return Singleton
     */
    public static function getInstance()
    {
        $class = get_called_class();

        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new $class();
        }

        return self::$instance[$class];
    }
}
