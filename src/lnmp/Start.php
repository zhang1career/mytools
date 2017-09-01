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
        list($err, $output) = FileSystem::newFolder('/tmp/logs/nginx');
        if ($err) {
            $log->error($output);
            return $err;
        }
        $log->info($output);

        list($err, $output) = FileSystem::newFolder('/tmp/logs/php');
        if ($err) {
            $log->error($output);
            return $err;
        }
        $log->info($output);

        list($err, $output) = FileSystem::newFolder('/tmp/logs/risk-engine');
        if ($err) {
            $log->error($output);
            return $err;
        }
        $log->info($output);

        // start nginx
        exec("pgrep nginx", $output, $err);
        if ($err) {
            exec('sudo nginx', $output, $err);
        } else {
            exec('sudo nginx -s reload', $output, $err);
        }

        // start php-fpm
        exec('launchctl unload -w ~/Library/LaunchAgents/homebrew.mxcl.php56.plist', $output, $err);
        exec('launchctl load   -w ~/Library/LaunchAgents/homebrew.mxcl.php56.plist', $output, $err);
    }
}
