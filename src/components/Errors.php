<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 24/08/2017
 * Time: 10:45 AM
 */

namespace phplab\commands\components;

class Errors
{
    public static function Encode($error_code, $error_tip=null)
    {
        if (is_null($error_tip)) {
            $error_tip = Consts::$ERROR_TIPS[$error_code];
        }
        return [$error_code, $error_tip];
    }
}
