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
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'defaultController' => 'home/index', // set default controller to HomeController
	'theme' => 'metronic',

	// preloading 'log' component
	'preload'=>array('log'),
	'aliases' => array(
		'themes' => dirname(__FILE__) . '/../../themes',
	),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'themes.*',
	),

	'modules'=>array(
        // uncomment the following to enable the Gii tool
        /*
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'Enter Your Password Here',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
        */
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
            'class' => 'VmsUser',
            'loginUrl' => array('user/login'),
		),

        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'baseUrl'=>'vms.php',
        ),
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),
        'redis' => require(dirname(__FILE__) . '/redis.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			// 'errorAction'=>'site/error',
			'errorAction' => 'home/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'llw.liuliwu@gmail.com',
		// vms developers
		'developers' => array(
			array('name' => 'liuliwu', 'email' => 'llw.liuliwu@gmail.com'),
		),
		// theme params
		'theme' => array(
			'body_classes' => array(
				'page-boxed', 
				'page-header-fixed', 
				'page-sidebar-closed-hide-logo', 
				'page-container-bg-solid', 
				'page-sidebar-closed-hide-logo',
			),
			'logo_file' => '',
			// 'sidebar_style' => 'default', // or compact
			// 'sidebar_menu' => 'hover', // or accordion
			// 'sidebar_position' => 'left', // or right
            'sidebar_menu_items' => array(
                array('icon' => 'home', 'title' => 'Dashboard', 'url' => array('/home/index')),
                array('icon' => 'folder', 'title' => 'Multi Level Menu', 'items' => array(
                    array('icon' => 'settings', 'title' => 'Item 1', 'items' => array(
                        array('icon' => 'user', 'title' => 'Sample Link 1', 'items' => array(
                            array('icon' => 'home', 'title' => 'Dashboard', 'url' => array('/home/aaa')),
                        ),),
                    ),),
                ),),
            ),
		),
	),
);
