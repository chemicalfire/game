<?php
if (!function_exists('pre')) {
    // 定义一个简单的打印函数
    function pre($var, $exit = true)
    {
        header("Content-type:text/html;charset=utf-8");
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

return array (
    'game' => '项目的名称',
    'platform' => 'dev', // 平台名称
    'online_date' => '2014-11-11', // 项目上线日期
    // developers
    'members' => array(
        array('name' => '刘立悟', 'email' => 'liwu@9173.com', 'roles' => array('admin', 'developer')),
        array('name' => '魏龙', 'email' => 'weilong@9173.com', 'roles' => array('developer')),
    ),
    'deploy_id' => 'dev', // 部署机代号
    'vms_code_path' => __DIR__,
    'backend_code_path' => __DIR__ . '/../backend',
    'tools_path' => __DIR__ . '/../tools', // 部署项目工具目录
    'config_path' => __DIR__ . '/../config', // 配置目录
    'app_root' => __DIR__."/../", // 项目的根目录
);