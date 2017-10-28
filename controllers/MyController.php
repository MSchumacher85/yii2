<?php 
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class MyController extends Controller{
	public function actionHello($id=null){
		
		$hi="Hello World";
		$names=['Ivanov','Petrov','Sidorov'];
		
		if(!$id) $id='test';/*Если у нас переменная $id пустая то присваиваем ей значение test*/
		
		/*return $this->render('hello',['hello'=>$hi,'names'=>$names]);*/
		return $this->render('hello',compact('hi','names','id'));/*То же самое что и строчкой выше*/
		
		
		
		}
	
	
	
	
	
	
	}



























?>