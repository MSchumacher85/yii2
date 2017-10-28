<?php

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName() /*Данная статичный метод позволяет указать ту таблицу с которой мы будем работать*/
    {
        return 'products';/*Имя таблицы с которой мы хотим работать*/
    }

    public function getCategory(){ /*Создаем метод в котором будем связывать таблицы, название у метода любое*/
        return $this->hasOne(Category::className(),['id' => 'parent']); /*Метод One() значит объеденить многих с одним,
                                                        то есть в нашем случае к множеству продуктов относится одна категория*/
    }
}
