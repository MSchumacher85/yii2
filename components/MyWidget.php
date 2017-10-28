<?php

namespace app\components;
use yii\base\Widget;


class MyWidget extends Widget
{
    public function run() /*метод run() отвечает за вывод данных в виджете*/
    {
        return $this->render('my');
    }
}