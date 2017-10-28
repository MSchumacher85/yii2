<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
<?= $form->field($model, 'text')->textarea(['rows'=>5]) ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>



<?php ActiveForm::end();?>