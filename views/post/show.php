<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
	
	<h1>Show</h1>
	<?php //$this->registerJsFile('@web/js/MyScripts.js',['depends' =>'yii\web\YiiAsset'])?><!--Подключаем нужный нам js файл именно к этой странице,вторым параметром указываем что подключение должно осуществляться только после того как мы подключим библиотеку jQuery-->
	
	<?php //$this->registerJs("$('.container').append('<p>SHOW!!!</p>');");?><!--Подключаем не целый файл,а только конкретный блок кода-->
	
	<?php //$this->registerCss(".container{background:#ccc}");?><!--Подключаем блок кода css-->
	
	





<button class="btn-success" id="btn">Отправка</button>
<?php 

$script = <<< JS
$('#btn').on('click', function(e) {
    $.ajax({
       url: 'index.php?r=post/index',              /*то куда мы отправляем запрос*/
       data: {test:'123'},						   /*отправляем переменную test со значением 123*/
	   type: 'GET',
       success: function(res) {                    /*помещаем ответ в переменную res*/
            console.log(res)
       },
	error: function(){
		alert('Error!');
	}   
    });
});
JS;
$this->registerJs($script);
	
	
	
	
?>
	
	
</body>
</html>