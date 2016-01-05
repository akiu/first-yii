<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Edit Product: ' . ' ' . $data->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['viewallproduct']];
$this->params['breadcrumbs'][] = ['label' => $data->product_id, 'url' => ['view', 'id' => $data->product_id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $data,
    ]) ?>

</div>