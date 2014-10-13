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
	public $layout='//layouts/column1';

    /**
     * @var array context page-level breadcrumbs
     */
    public $breadcrumbs = array();

    /**
     * @var array context page-level css style links.
     */
    public $pageLevelStyles = array();

    /**
     * @var array context page-lavel script links
     */
    public $pageLevelPlugins = array();

    /**
     * @var array context page-level script contents
     */
    public $pageLevelScripts = array();
}