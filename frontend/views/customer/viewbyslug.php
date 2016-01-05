<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;
use yii\bootstrap\Modal;

$this->title = "View Product";

?>




	

		

			<div class="row">
				
				<div class="col-md-5 main">
					
					<h1><?= Html::encode($model->product_name) ?></h1>

					<?= Html::img("/advanced2/" . substr($image[0]['image_url'], 24), ['class' => 'main-picture']); ?>
					
					
					<ul>

					<?php

						foreach ($image as $data ) {

						echo "<li>";

						echo Html::img("/advanced2/" . substr($data->image_url, 24), ['class' => 'selection-image']);

						echo "</li>";
						}
					?>
				
					</ul>
					</div>
				

				<div class="col-md-7">

					
					<h1><?= "Rp." . " " . Html::encode($model->product_price); ?></h1>
					
					<h3>Product Description</h3>
					<p><?= Html::encode($model->product_description); ?> </p>

					
					<h3>Product Quantity</h3>

					<div class="controls form-inline">	
					<?= Html::beginForm(['site/index'], 'post'. ['class' => 'form-inline']) ?>

					<?= Html::input('number','quantity', '',['min' => '1', 'max' => '5', 'required' => '', 'class' => 'form-control', 'id' => 'quan-text']) ?> 
					<?= Html::button('Add to Cart', ['id' => 'tbl-show', 'class' => 'btn btn-default tbl-add', 'style' => 'width: 200px;']) ; ?>
					</div>
					<?= Html::endForm() ?>	


				
				

				</div>




	</div>



<?php

$script = <<< JS

	$(".selection-image").click(function() {

		$(".main-picture").attr("src", $(this).attr("src"));
		$(this).addClass('selected');
		$(".selection-image").not(this).removeClass('selected');

	});

	$("#tbl-show").click(function() {

		$("#quan-h3").html($("#quan-text").val());

		var a = parseInt($("#quan-text").val());
		var b = parseInt($("#price-h3").html());
		var c = a * b;
		$("#total-h3").html(c);

			$("#add-modal").modal({
  				keyboard: false,
			});
	
	});

	

	

	$("#tbl-confirm").click(function(){

		
		$.ajax({
			method: "post",
			url: "index.php?r=customer/addcart",
			data: { productname: $(this).attr("data-productname"), quantity: $("#quan-text").val() }

		}) .done(function(data){

				$("#add-modal").modal('hide');

					$("#add-modal").on('hidden.bs.modal', function () {
  				
  						//$("#loadin").modal('show');
  						alert("Added to cart");
				}); 
				//alert(data);
		});
		

		//alert($("#quan-text").val());
	}); 
JS;

$css = <<< CSS

	.main ul li {

		list-style-type: none;
	}

	#quantity-text {

		margin-right: 20px;
	}	

	.tbl-add {

		color: black;
		background-color: white;
		border: 1px black solid;
	}

	.tbl-add:hover {

		background-color: black;
		color: white;
	}

	#quan-text {

		width: 200px;

	}

	.modal-picture {

		width: 200px;
		height: 200px;
	}

CSS;

$this->registerCss($css);
$this->registerJs($script, 3);
?>


<?php

Modal::begin([

	'header' => '<h3>Add to cart</h3>',
	'id' => "add-modal",
	'size' => 'modal-md',
	'footer' => '<button data-dismiss="modal" class="btn btn-danger">Close</button><button id="tbl-confirm" class="btn btn-primary" data-productname="' . $model->product_name . '">Confirm</button>'

]);

	
	echo "<div class=\"row\">"; 

	echo "<div class=\"col-md-4\">";
	echo "<h3>" . Html::encode($model->product_name) . "</h3>";
	echo Html::img("/advanced2/" . substr($image[0]['image_url'], 24), ['class' => 'modal-picture']);

	echo "</div>";

	echo "<div class=\"col-md-1\">";
	echo "</div>";

	echo "<div class=\"col-md-7\">";

	echo "<h3>" . "Details" . "</h3>";

	echo "<h4>Price" . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " . ":" . "&nbsp;&nbsp;&nbsp;" . "<span id=\"price-h3\">" .  $model->product_price . "</span>" . "</h4>";
	echo "<h4>Quantity" . "&nbsp;&nbsp;&nbsp; " . ":" . "&nbsp;&nbsp;&nbsp;" .  "<span id=\"quan-h3\"></span>" . "</h4>";
	echo "<h4>Total" . " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . ":" . "&nbsp;&nbsp;&nbsp;" . "<span id=\"total-h3\"></span>" . "</h4>";
	echo "</div>";
Modal::end();




?>



