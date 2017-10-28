<?php 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class DataForm extends ActiveRecord {

    public static function tableName()
    {
        return 'posts';
    }

    //public $name;
	//public $email;
	//public $text;

	public function attributeLabels()/*Данная функция позволяет задать имена для наших полей*/
    {
        return [

            'name'=>'Имя',
            'email'=>'E-Mail',
            'text'=>'Текст сообщения',
        ];
    }

    public function rules()/*Данная функция отвечает за валидацию*/
    {
       return[
           [['name','text'],'required'],/*required устанавливает что данные поля обязательны для заполнения*/
           ['email','email'],/* устанавливает что данное поле должно иметь тип email*/
           ];
    }

}







?>