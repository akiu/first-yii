<?php
	use yii\helpers\Html;
	$this->title = "View Product";

?>

<h1> <?= Html::encode($this->title); ?> </h1>

<a href="http://localhost/advanced2/backend/web/index.php?r=product/createproduct" class="btn btn-primary">Create Product</a>
<br />
<br />
<table class="table table-bordered">

<tr>
	<th>Name</th>
	<th>Price</th>
	<th>Action</th>

</tr>	
<?php
	
	foreach($model as $data) {

		echo "<tr>";
		echo "<td>" . $data->product_name . "</td>";
		echo "<td>" . $data->product_price . "</td>";
		echo "<td>" . 
		Html::a('View', ['viewproductbyid', 'id' => $data->product_id], ['class' => 'btn btn-primary']) . 
		Html::a('Edit', ['editproduct', 'id' => $data->product_id], ['class' => 'btn btn-success']) . 
		Html::a('Delete', ['deleteproduct', 'id' => $data->product_id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Apakah akan menghapus product ini ?', 'method' => 'post'],]) . 
		Html::a('Slug', ['viewproductbyslug', 'slug' => $data->product_slug], ['class' => 'btn btn-info']) . 
		"</td>";
		echo "</tr>";
		
	}


?>


</table>


