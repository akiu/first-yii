<?php

namespace frontend\controllers;

use frontend\models\orderModel;
use Yii;

class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {

    	$model = new orderModel();

    	if ($model->load(Yii::$app->request->post()))
    	{

    		if($model->validate())
    		{

    			$model->save($user_id, $date, $product_name, $product_id);


    		}


    	}



    }

}
