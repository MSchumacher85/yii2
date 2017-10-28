<?php use app\components\MyWidget; ?>

<?php echo MyWidget::widget(); ?>

<h1>Test</h1>
<?php //\app\controllers\debug(Yii::$app); ?><!--Вызывам нашу глобальную переменную debug и распечатываем массив который нам необходим-->

<?php debug(Yii::$app);?><!--Тоже самое что и выше только теперь распечатывем через наш файл с функциями-->


