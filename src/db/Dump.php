<?php

namespace phplab\commands\db;

use MySQLDump;
use mysqli;
use phplab\commands\CommandInterface;
use phplab\commands\services\Config;

class Dump implements CommandInterface
{
    /**
     * @return mixed
     */
    public function run()
    {
        $config = Config::getValue();
        $db = $config['db'];

        $dump = new MySQLDump(new mysqli($db['host'], $db['user'], $db['pass'], $db['database']));
        $dump->save('hahaha.sql.gz');

        return 0;
    }
}
