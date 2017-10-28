<?php
/**
 * Created by PhpStorm.
 * User: Мент
 * Date: 21.01.2017
 * Time: 14:44
 */

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName() /*Данная статичный метод позволяет указать ту таблицу с которой мы будем работать*/
    {
        return 'categories';/*Имя таблицы с которой мы хотим работать*/
    }

    public function getProduct(){ /*Создаем метод в котором будем связывать таблицы, название у метода любое*/
        return $this->hasMany(Product::className(),['parent' => 'id']); /*Метод hasMany() значит объеденить один с многими,
                                                        то есть в нашем случае к одной категории может относиться много продуктов,
                                                        первым параметром мы передаем название класса с которым связываем,
                                                        вторым название поля в данной таблице класса по которому мы связываем
                                                        эти таблицы, то есть в нашем случае в таблице products это поле parent
                                                        которое соответствует полю id в текущей таблице класса то есть таблице 'categories'*/
    }
}