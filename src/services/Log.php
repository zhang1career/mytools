<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 30/08/2017
 * Time: 3:39 PM
 */

namespace app\services;

use app\components\Singleton;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log extends Singleton
{
    /**
     * logger
     * @var
     */
    public static $logger;

    /**
     * Log constructor.
     * @param Logger $logger
     */
    protected function __construct(Logger $logger)
    {
        self::$logger = $logger;
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        $class = get_called_class();

        if (!isset(self::$instance[$class])) {
            $config = Config::getValue();
            self::$instance[$class] = new $class(new Logger($config['info']['app']));
            self::$logger->pushHandler(new StreamHandler('php://stdout', Logger::INFO));
        }

        return self::$logger;
    }
}
