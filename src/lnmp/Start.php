<?php

namespace app\lnmp;

use app\components\filesystem;
use app\services\Log;

class Start
{
    /**
     * @return string
     */
    public function run()
    {
        $log = Log::getInstance();

        // create logs folder
        list($error, $tip) = FileSystem::newFolder('/tmp/logs/nginx');
        if ($error) {
            $log->error($tip);
            return $error;
        }
        $log->info($tip);

        list($error, $tip) = FileSystem::newFolder('/tmp/logs/php');
        if ($error) {
            $log->error($tip);
            return $error;
        }
        $log->info($tip);

        list($error, $tip) = FileSystem::newFolder('/tmp/logs/risk-engine');
        if ($error) {
            $log->error($tip);
            return $error;
        }
        $log->info($tip);

        // start nginx
        if (!file_exists('/usr/local/var/run/nginx.pid')) {
            passthru('sudo nginx', $error);
        } else {
            passthru('sudo nginx -s reload', $error);
        }

        // start php-fpm
        passthru('launchctl unload -w ~/Library/LaunchAgents/homebrew.mxcl.php56.plist');
        passthru('launchctl load   -w ~/Library/LaunchAgents/homebrew.mxcl.php56.plist');
    }
}
