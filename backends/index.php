<?php

/**
 * 引用的入口分发文件
 */

/**
 * 版本控制管理类
 * Class VmsManager
 */
class VmsManager
{
    protected $request = array();
    protected $codeBasePath;
    protected $codePath;
    protected $codeAuth;
    protected $configBasePath; // 配置文件路径
    protected $configPath;
    protected $logBasePath;
    protected $logPath;
    protected $entry;
    protected $version;

    protected $versionInfoHandler;


    public function __construct(array $config)
    {
        // 添加配置
        $configConfigs = array(
            'codeBasePath' => 'code_base_path',
            'configBasePath' => 'config_base_path',
            'logBasePath' => 'log_base_path',
            'codeAuth' => 'auth',
            'entry' => 'entry_file',
            'version' => 'default_version',
        );
        foreach ($configConfigs as $propertyName => $configKey) {
            if (isset($config[$configKey]) && !empty($config[$configKey])) {
                $this->$propertyName = $config[$configKey];
            } else {
                exit('缺少配置' . $configKey);
            }
        }
    }


    public function init()
    {
        // 根据请求参数获得对应参数
        $request = array();
        if (php_sapi_name() == 'cli') {
            global $argv, $argc;
            for ($i = 1; $i < $argc; $i++) {
                foreach (explode(",", $argv[$i]) as $v) {
                    list($key, $value) = explode('=', $v);
                    $request[$key] = $value;
                }
            }
        } else {
            if (isset($_REQUEST['mod'])) {
                $request['mod'] = $_REQUEST['mod'];
            }
            if (isset($_REQUEST['ver'])) {
                $request['ver'] = $_REQUEST['ver'];
            } else {
                $request['ver'] = $this->version;
            }
            if (isset($_REQUEST['pf'])) {
                $request['pf'] = $_REQUEST['pf'];
            }
            if (isset($_REQUEST['cfg'])) {
                $request['cfg'] = $_REQUEST['cfg'];
            }
            if (isset($_REQUEST['auth'])) {
                $request['auth'] = $_REQUEST['auth'];
            }
        }
        foreach ($request as $key => $value) {
            if (!defined('UNIT_TEST')) {
                if (!preg_match('/^[0-9a-zA-Z_.-@]+$/', $value)) {
                    die("invalid $key param");
                }
            }
        }
        $this->request = $request;

        // 设置代码路径和配置路径
        $this->codePath = $this->codeBasePath . '/' . $this->request['ver'];
        $this->logPath = $this->logBasePath . '/' . $this->request['ver'];
        $this->configPath = $this->configBasePath . '/' . $this->request['ver'];

        if (!in_array($this->request['ver'], array('dev', 'test'))) {
            $this->codeAuth = false;
        }

        if (!file_exists($this->codePath) || !is_dir($this->codePath)) {
            exit('代码版本目录不存在' . $this->codePath);
        }
        if (!file_exists($this->configPath) || !is_dir($this->configPath)) {
            exit('配置版本目录不存在' . $this->configPath);
        }
        if (!file_exists($this->logPath) || !is_dir($this->logPath)) {
            exit('日志目录不存在' . $this->logPath);
        }
        if ($this->codeAuth && $this->codeAuth != $this->request['auth']) {
            exit('密钥不正确' . $this->request['auth']);
        }
        define('APP_PATH', $this->codePath);
        define('CONFIG_PATH', $this->configPath);
        define('LOG_PATH', $this->logPath);
        define('PLATFORM', $this->request['pf']);
        define('MODULE', $this->request['mod']);
    }


    public function runApp()
    {
        $entry = $this->codePath . '/' . $this->entry;
        if (!file_exists($entry)) {
            exit('应用的入口文件不存在' . $entry);
        }
        require_once $entry;
    }
}


$vmsMgr = new VmsManager(require_once 'config.php');
$vmsMgr->init();
$vmsMgr->runApp();

