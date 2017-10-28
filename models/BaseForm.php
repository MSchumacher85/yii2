<?php 
namespace app\models;

use Yii;
use yii\base\Model;


class BaseForm extends Model{
	
	public $name;
	public $email;
	public $text;

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
           [['name','email'],'required'],/*required устанавливает что данные поля обязательны для заполнения*/
           ['email','email'],/* устанавливает что данное поле должно иметь тип email*/
           ['name','string','min'=>2],/* устанавливает что имя должно быть не короче двух символов*/
           ['name','string','max'=>15],/* устанавливает что имя должно быть длиннее 15 символов*/
           /*['name','string','length'=>[2,15]] можно установить одной строчкой что длинна должна быть не менее 2 и не более 15*/
           ['text','trim']/*Обрезаем пробелы с переди и сзади у поля text*/
           ];
    }

}







?>