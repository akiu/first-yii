<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            

            'product_id',
            'product_name',
            'product_main_picture',
            'product_price',
            [
                'attribute' => 'product_category',
                'value' => 'product_category',
                'filter' => Html::activeDropDownList($searchModel, 'product_category', ArrayHelper::map(backend\models\Category::find()->asArray()->all(), 'category_id', 'category_name'),['class'=>'form-control','prompt' => 'Select Category']),
            ],
            // 'product_created_date',
            // 'admin_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
