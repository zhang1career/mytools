<?php
/**
 * Created by PhpStorm.
 * User: zhang
 * Date: 24/08/2017
 * Time: 10:17 AM
 */

namespace App\Components;

class Consts
{
    const OK                                = 0;
    const INFO_DONE_WITHOUT_ACTION          = 1;

    const WARNING   = 50;

    const ERROR                             = 100;
    const ERROR_PARAM_NOT_FOUND             = 101;
    const ERROR_FILESYSTEM_CREATE_FAILURE   = 141;

    const FATAL     = 150;

    const RUNTIME   = 200;

    public static $ERROR_TIPS = [
        self::OK                                => '成功',
        self::INFO_DONE_WITHOUT_ACTION          => '目标已存在，无需执行操作',

        self::ERROR_FILESYSTEM_CREATE_FAILURE   => '文件创建失败',
    ];
}