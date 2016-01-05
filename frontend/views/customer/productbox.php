<?php

use yii\helpers\Html;
use common\models\Image;


$image = Image::find()->where(['product_id' => $model->product_id])->one();
?>

<div class="col-md-3 productbox">

	<div class="inner-box">

		<?= Html::img("/advanced2/" . substr($image->image_url, 24), ['class' => 'main-product-image']) ?>
		<h5><?= Html::encode($model->product_name ); ?></h5>
		<p>Rp. <?= Html::encode($model->product_price) ?></p>
		<?= Html::a('View',['customer/viewbyslug', 'slug' => $model->product_slug],['class' => 'btn btn-success tbl-beli']); ?>

	</div>
</div>

<?php

$css = <<< CSS

	.productbox {
		
		background-color: white;
		border: 1px black solid;
		margin: 5px;	
		text-align: center;
		padding: 5px;
		border-radius: 10px;
		width: 200px;
	}

	.main-product-image {

		width: 100px;
		height: 100px;
		border-radius: 5px;
		
	}

	

	.tbl-beli {

		background-color: #FCF5F5;
		color: black;
		width: 160px;
		border: black solid 1px;
	}

	.tbl-beli:hover {

		background-color: black;
		color: white;
		width: 160px;
	}

	.inner-box {

		padding: 5px;
		background-color: white;
	}

	


CSS;

$script = <<< JS
	
	$(".inner-box").hover(function() {

		$(this).parent().css("background-color", "black");
	}, function() {
		$(this).parent().css("background-color", "white");	
	}

	);

JS;

$this->registerJs($script);
$this->registerCss($css);

?>