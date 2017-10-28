<?php 

namespace app\controllers;
use app\models\Category;
use Yii;
use app\models\BaseForm;
use app\models\DataForm;
use yii\data\Sort;

class PostController extends AppController{
	
	public $layout='basic';/*Устанавливаем наш шаблон для всех страниц для данного контроллера*/
	
	public function actionTest(){
		
		/*$this->debug(Yii::$app);Вызываем нашу функцию которую мы создали в AppController и распечатываем необходимый нам массив*/
		return $this->render('test');
		
		}
		
	public function actionIndex(){
		return $this->render('index');
		}
	
	public function actionShow(){
		//$this->layout='basic';/*Устанавливаем наш шаблон для данной страницы*/
		
		$this->view->title='Одна статья';//Подключаем title
		
		$this->view->registerMetaTag(['name'=>'keywords','content'=>'ключевые слова']);//Подключаем мета тег,первый параметр название метатега,второй параметр его содержание
		$this->view->registerMetaTag(['name'=>'description','content'=>'описание страницы']);
		
		return $this->render('show');
		
		
		}
	
	public function actionBase(){
		
		$model=new BaseForm();
		if($model->load(Yii::$app->request->post() ) ){/*Если данные из формы загрузились,загружаем массив данных
		                                               где Yii::$app имя приложения, от конечных пользователей отвечает за это request
												       получееных через post запрос */
            if($model->validate()){/*и если данные провалидировались*/
                Yii::$app->session->setFlash('success','Данные приняты');/*Создаем флеш-сообщение*/
                return $this->refresh();/*Перезапускаем нашу страницу если данные отправились*/
            }
            else{Yii::$app->session->setFlash('error','Ошибка');}

        }



		return $this->render('base',compact('model','name','email','text'));
	}

    public function actionRecord(){
        //$cats=Category::find()->all(); /*Выбераем все из таблицы, за выборку отвечает метод find()*/
        //$cats=Category::find()->orderBy(['id'=>SORT_ASC])->all();/*Выбераем все из таблицы и сортируем по id, SORT_AS Cозначает сортировать по умолчанию, SORT_DESC сортировка в обратном порядке */
        //$cats=Category::find()->asArray(); /*Выбераем данные не в виде обьекта,а виде массива*/

        //$cats=Category::find()->asArray()->where('parent=691')->all();/*Выбераем данные где поле parent равно 691*/
        //$cats=Category::find()->asArray()->where(['parent'=>691])->all();/*Выбераем данные где поле parent равно 691*/

        //$cats=Category::find()->asArray()->where(['like','title','pp'])->all();/*Выбераем все данные у кого в полее title встречаютя pp*/
        //$cats=Category::find()->asArray()->where(['<=','id','695'])->all();/*Выбераем все данные у кого id меньше или равно 695*/

        //$cats=Category::find()->asArray()->where('parent=691')->limit(1);/*Выбераем только одну запись где поле parent равно 691*/
        //$cats=Category::find()->asArray()->where('parent=691')->limit(1)->one();/*Выбераем только одну запись где поле parent равно 691*/
        //$cats=Category::find()->asArray()->where('parent=691')->one();/*Выбераем только одну запись где поле parent равно 691*/
        //$cats=Category::find()->asArray()->where('parent=691')->count();/*Получаем колличество записей где поле parent равно 691*/
        //$cats=Category::find()->asArray()->count();/*Получаем колличество записей в нашей таблице*/

        //$cats=Category::findOne(['parent'=>691]);/*Получим только одну запись соответствующую условию*/
        //$cats=Category::findAll(['parent'=>691]);/*Получим все соответствующие условию*/

        //$query="SELECT * FROM categories WHERE title LIKE :search";
        //$cats=Category::findBySql($query,[':search'=>'$pp%'])->all();/*метод findBySql позволяет отправить sql запрос,:search в данном случае псевдопеременная*/

        //$cats=Category::find()-all();/*Использовали отложенную загрузку, получим только данные находящиеся в таблице categories*/
        $cats=Category::find()->with('product')->all();/*Жадная загрузка, используем метод with в котором указываем связь, getProduct в классе Category*/

        return $this->render('record',compact('cats'));
    }

    public function actionData(){

        //$post=DataForm::findOne(2); не работает
        //$post->email ='222@222.com'; не работает
        //$post->save(); не работает

        //$post->delete(); не работает

        DataForm::deleteAll(['>','id','3']);/*Удалить все записи где id больше 3, если не передадим параметры то будут удалены все записи из таблицы*/

        $model=new DataForm();
        /* $model->name='Автор';
         $model->email='111';
         $model->text='Текст сообщения';
         $model->save(); Метод save() добавляет данные в таблицу/, так как объект $model создан с помощью new*/



        if($model->load(Yii::$app->request->post() ) ){/*Если данные из формы загрузились,загружаем массив данных
		                                               где Yii::$app имя приложения, от конечных пользователей отвечает за это request
												       получееных через post запрос */
            if($model->save()){/*и если данные провалидировались validate(),можно использовать save() вместо validate()*/
                Yii::$app->session->setFlash('success','Данные приняты');/*Создаем флеш-сообщение*/
                return $this->refresh();/*Перезапускаем нашу страницу если данные отправились*/
            }
            else{Yii::$app->session->setFlash('error','Ошибка');}

        }



        return $this->render('data',compact('model','name','email','text'));
    }

	
	};




?>