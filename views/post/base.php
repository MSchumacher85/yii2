<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;/*Подключаем расширение редактор*/

?>

<?php if(Yii::$app->session->hasFlash('success')): ?> <!--Получаем флеш-сообщение если оно есть в сессии-->
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success') ?><!--Выводим флеш-сообщение-->
    </div>

<?php endif; ?>

<?php if(Yii::$app->session->hasFlash('error')): ?><!--Получаем флеш-сообщение если оно есть в сессии-->
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error') ?><!--Выводим флеш-сообщение-->
    </div>
<?php endif; ?>


<?php $form=ActiveForm::begin(['options'=>['id'=>'base-form']]);?>

<?= $form->field($model, 'name') ?> <!-- $form->field($model, 'name')->label('Имя') можно использовать метод label чтобы задать имя для поля -->
<?= $form->field($model, 'email') ?><!--метод input определяет какого типа должно быть наше поле-->

<?php   /*Подключаем расширение редактор*/
    echo $form->field($model, 'text')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);
?>


<?= $form->field($model, 'text')->textarea(['rows'=>5]) ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?><br><br>

<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?><!--Подключаем наше расширение календарь-->



<?php ActiveForm::end();?>