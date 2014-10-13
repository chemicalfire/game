<?php
/**
 * 应用外层配置文件
 */

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

$basePath = dirname(__FILE__);

return array(
    // 版本管理控制
    'vms' => array(
        'installation' => 'local', // 非本机安装则为remote, 如果是remote安装，则不需要以下的配置
        'path' => $basePath . '/../vms',
    ),
    // 其他配置信息
    'dev_path' => $basePath . '/dev', // 开发路径
    'test_path' => $basePath . '/test', // 测试路径
    // dev和test环境需要认证
    'dev_auth' => '123456',
    'test_auth' => '654321',

);