<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 24/08/2017
 * Time: 10:17 AM
 */

namespace app\components;

class FileSystem
{

    public static function newFolder($path)
    {
        // path already exists
        if (is_dir($path)) {
            return Errors::Encode(Consts::OK, Consts::$ERROR_TIPS[Consts::INFO_DONE_WITHOUT_ACTION]);
        }

        // path create failure
        if (!mkdir($path, 0777, true)) {
            return Errors::Encode(Consts::ERROR_FILESYSTEM_CREATE_FAILURE);
        }

        return Errors::Encode(Consts::OK);
    }
}
