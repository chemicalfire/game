<?php 

class HomeController extends Controller 
{


	public function actionIndex() 
	{
		return $this->render('index');
	}


	public function actionError() 
	{

	}
}