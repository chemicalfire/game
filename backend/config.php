<?php
/**
 * 应用外层配置文件
 */

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

$basePath = dirname(__FILE__);

return array(
    'code_base_path' => $basePath, // 代码根目录
    'auth' => '123456', // dev和test环境需要认证
    'config_base_path' => $basePath . '/../config', // 配置文件根目录
    'log_base_path' => $basePath . '/../log', // 日志文件根目录
    'entry_file' => 'index.php', // 项目的入口文件
    'default_version' => 'dev', // 默认的版本
);