<?php

class UserController extends Controller
{


    public $layout='//layouts/column1';


    public function accessRules()
    {
        $rules = parent::accessRules();
        array_unshift($rules, array(
            'allow', // allow all users to access login/logout page
            'actions' => array('login', 'logout'),
            'users' => array('*'),
        ));
        return $rules;
    }


    public function actionLogin()
    {
        if (!Yii::app()->user->isGuest) {
            return $this->redirect(Yii::app()->user->returnUrl);
        }
        $form = new LoginForm();
        $errors = array();
        if (isset($_POST['login'])) {
            $form->attributes = $_POST['login'];
            // validate user input and redirect to the previous page if valid
            $form->validate();
            $errors = $form->getErrors();
            if (empty($errors) && $form->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        return $this->render('login', array('errors' => $errors));
    }


    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->user->returnUrl);
    }
}