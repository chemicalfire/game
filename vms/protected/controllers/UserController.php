<?php

class UserController extends Controller
{


    public $layout='//layouts/column1';


    public function accessRules()
    {
        $rules = parent::accessRules();
        array_unshift($rules, array('allow', // allow all users to access login page
            'actions' => array('login'),
            'users' => array('*'),
        ));
        return $rules;
    }


    public function actionLogin()
    {
        return $this->render('login');
    }
}