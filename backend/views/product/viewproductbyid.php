<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;


$this->title = "View Product";
?>







	

		

			<div class="row">
				
				<div class="col-md-5 main">
					
					<h1><?= Html::encode($model->product_name) ?></h1>

					<?= Html::img("http://localhost/advanced2/" . substr($image[0]['image_url'], 24), ['class' => 'main-picture']); ?>
					
					
					<ul>

					<?php

						foreach ($image as $data ) {

						echo "<li>";

						echo Html::img("http://localhost/advanced2/" . substr($data->image_url, 24), ['class' => 'selection-image']);

						echo "</li>";
						}
					?>
				
					</ul>
					</div>
				

				<div class="col-md-5">
					
					<h1><?= "Rp." . " " . Html::encode($model->product_price); ?></h1>
					
					<h2>Product Description</h2>
					<p><?= Html::encode($model->product_description); ?> </p>
					<?= Html::a('Buy This',['#'], ['class' => 'btn btn-success', 'style' => 'width: 500px;']) ?>



				
				

				</div>




	</div>



<?php

$script = <<< JS

	$(".selection-image").click(function() {

		$(".main-picture").attr("src", $(this).attr("src"));
		$(this).addClass('selected');
		$(".selection-image").not(this).removeClass('selected');

	});

JS;

$css = <<< CSS

	.main ul li {

		list-style-type: none;
	}	

CSS;

$this->registerCss($css);
$this->registerJs($script, 3);
?>

