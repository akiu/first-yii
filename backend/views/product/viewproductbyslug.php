<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;


$this->title = "View Product";
?>







	<div class="container" style="margin-top: 20px; ">

		

			<div class="row">
				
				<div class="col-lg-5" style="width: 580px;">
					
					<h1><?= Html::encode($model->product_name) ?></h1>

					<?= Html::img("http://localhost/advanced2/" . substr($image[0]['image_url'], 24), ['class' => 'main-picture']); ?>

					<div class="col-lg-2">
					
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
				</div>

				<div class="col-lg-5">
					
					<h1><?= "Rp." . " " . Html::encode($model->product_price); ?></h1>
					
					<h2>Product Description</h2>
					<p><?= Html::encode($model->product_description); ?> </p>
					<?= Html::a('Buy This',['#'], ['class' => 'btn btn-success', 'style' => 'width: 500px;']) ?>



				
				

				</div>




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

$this->registerJs($script, 3);
?>

