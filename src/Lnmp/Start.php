<?php

namespace App\Lnmp;

use App\Components\FileSystem;

class Start
{
    /**
     * @return string
     */
    public function run()
    {
        list($error, $tip) = FileSystem::newFolder('/tmp/logs/nginx');
        if (!$error) {
            echo $tip;
        }

        list($error, $tip) = FileSystem::newFolder('/tmp/logs/php');
        if (!$error) {
            echo $tip;
        }

        list($error, $tip) = FileSystem::newFolder('/tmp/logs/risk-engine');
        if (!$error) {
            echo $tip;
        }

//        exec('sudo nginx -s reload');
//        exec('sudo php-fpm')
        return ;
    }
}
