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

return array (
    'game' => '项目的名称',
    'platform' => 'dev', // 平台名称
    'online_date' => '2014-11-11', // 项目上线日期
    'deploy_id' => 'dev', // 部署机代号
    'deploy_code_path' => array(
        'backend' => __DIR__ . '/../backend', // 后端代码
        'frontend' => __DIR__ . '/../frontend', // 前段代码
    ),
    'deploy_tools_path' => __DIR__ . '/../deploy-tools', // 部署项目工具目录
    'app_root' => __DIR__."/../", // 项目的根目录
);