<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
<?= Html::csrfMetaTags() ?>
</head>

<body>
<?php $this->beginBody() ?>
	<div class="wrap">
    	<div class="container">
			 <ul class="nav nav-tabs">
			  <li role="presentation" class="active"><?= Html::a('Главная','/') ?></li><!--< ?= Html::a('Главная','/yii_2/web/') ?> Первый парамент название ссылки,второй путь-->
			  <li role="presentation"><?= Html::a('Статья',['post/show']) ?></li>
			  <li role="presentation"><?= Html::a('Тестовая',['post/test']) ?></li>
			  <li role="presentation"><?= Html::a('Форма',['post/base']) ?></li>
			</ul>         
          <?= $content ?>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
