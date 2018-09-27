<?php

namespace phplab\commands\lnmp;

use phplab\commands\CommandInterface;
use phplab\commands\components\filesystem;
use phplab\commands\services\Log;
use Exception;

class Start implements CommandInterface
{
    /**
     * @param array $args
     * @return Exception
     */
    public function run(array $args = [])
    {
        // create logs folder
        try {
            $this->mkdir('/tmp/logs/nginx');
            $this->mkdir('/tmp/logs/php');
            $this->mkdir('/tmp/logs/redis');
            $this->mkdir('/tmp/logs/risk-engine');
        } catch (Exception $e) {
            return $e;
        }

        // start nginx
        exec("pgrep nginx", $output, $err);
        if ($err) {
            exec('sudo nginx', $output, $err);
        } else {
            exec('sudo nginx -s reload', $output, $err);
        }

        // start php-fpm
        exec('launchctl unload -w ~/Library/LaunchAgents/homebrew.mxcl.php71.plist', $output, $err);
        exec('launchctl load   -w ~/Library/LaunchAgents/homebrew.mxcl.php71.plist', $output, $err);

        return $err;
    }

    protected function mkdir($path)
    {
        $log = Log::getInstance();

        list($err, $output) = FileSystem::newFolder($path);
        if ($err) {
            $log->error($output);
            throw new Exception($err);
        }
        $log->info($output);
    }
}
