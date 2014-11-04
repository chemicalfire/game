<?php

if (!function_exists('pre')) {
    // 定义一个简单的打印函数
    function pre($var, $exit = true)
    {
        if (is_bool($var) || is_numeric($var) || is_string($var)) {
            $output = var_export($var, true);
        } else {
            $output = print_r($var, true);
        }
        echo '<pre>', $output, '</pre>';
        if ($exit) {
            exit();
        }
    }
}

if(!function_exists('fastcgi_finish_request')) {
    // 提前将请求结果返回
    function fastcgi_finish_request() {
        flush();
    }
}


// 常用常量定义
define('APP_PATH', dirname(__FILE__)); // 定义应用根路径
define('FW_PATH', APP_PATH . '/framework'); // 定义框架路径
define('TIME', time()); // 定义当前时间戳
define('TIME_ZONE', 'Asia/Shanghai'); // 定义当前时区
date_default_timezone_set(TIME_ZONE); // 设置市区
define('DATE', date('Y-m-d', TIME)); // 定义当前日期（年-月-日）
define('DATE_TIME', date('Y-m-d H:i:s', TIME)); // 定义当前日期时间（年-月-日 时:分:秒）

// 加载框架自动加载机制
/* @var $autoLoader \Composer\Autoload\ClassLoader */
$autoLoader = require_once FW_PATH . '/vendor/autoload.php';
$autoLoader->add('core_', FW_PATH); // 注册core名称空间




