<?php
// 常用常量定义
define('TIME', time());
define('TIME_ZONE', 'Asia/Shanghai');
date_default_timezone_set(TIME_ZONE);
define('DATE', date('Y-m-d', TIME));
define('DATE_TIME', date('Y-m-d H:i:s', TIME));

// 加载框架自动加载机制
/* @var $autoLoader \Composer\Autoload\ClassLoader */
$autoLoader = require_once FW_PATH . '/vendor/autoload.php';
$autoLoader->add('core_', FW_PATH); // 注册core名称空间

