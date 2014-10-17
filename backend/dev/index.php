<?php
!defined('APP_PATH') && die('Access Denied');
define('FW_PATH', APP_PATH . '/framework');
require_once APP_PATH . '/config.php'; // 包含配置文件

core_Engine::createApplication()->run(MODULE);


