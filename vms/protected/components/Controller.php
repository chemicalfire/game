<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column2';

    /**
     * @var array context page-level breadcrumbs
     */
    public $breadcrumbs = array();

    /**
     * @var array context page-level css style links.
     */
    public $pageLevelStyles = array();

    /**
     * @var array context page-level plugin css style links.
     */
    public $pageLevelPluginStyles = array();

    /**
     * @var array context page-lavel script links
     */
    public $pageLevelPlugins = array();

    /**
     * @var array context page-level script links
     */
    public $pageLevelScripts = array();

    /**
     * @var array context page scripts contents
     */
    public $pageScripts = array();

    /**
     * @var array context page-level body classes
     */
    public $pageLevelBodyClasses = array();


    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * @return array access rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

}