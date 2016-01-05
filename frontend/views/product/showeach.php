<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\HtmlPurifier;


/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-3" style="border-style: solid; border-width: 1px; margin: 10px; text-align: center; padding: 8px; width: 300px; height: 330px;">

<?php 
echo "<h5>" . HtmlPurifier::process($products->product_name) . "</h5>";
echo  Html::img(substr($products->product_main_picture, 13), ['width' => 125, 'height' => 125]);

echo "<h5>" . "Rp." . " " . HtmlPurifier::process($products->product_price) . "</h5>";
$form = ActiveForm::begin([

		'action' => ['order/create', 'user_id' => Yii::$app->user->getId(), 'date' => date('Y-m-d'), 'product_name' => $products->product_name, 'product_id' => $products->product_id],
		'method' => 'post',


	]); 
echo $form->field($order, 'product_quantity')->textInput(['style' => 'width: 100px; position: relative; left: 105px;']);

//echo Html::submitButton('Beli', ['class' => 'btn btn-primary', 'style' => 'width: 100px;']);    
echo Html::submitButton('Beli', ['class' => 'btn btn-primary beli-button', 'style' => 'width: 100px;']);
ActiveForm::end();


   
?>
</div>

<?php

	$script = <<< JS

		$(".beli-button").click(function(){

			$(this).parent().find

		});





	JS;


?>