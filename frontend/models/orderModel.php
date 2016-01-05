<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Order;
/**
 * ContactForm is the model behind the contact form.
 */
class orderModel extends Model
{

	public $order_id;
    public $order_created_date;
    public $user_id;
    public $product_id;
    public $product_name;
    public $product_quantity;

    public function rules()
    {

    	return [

    		
    		[['order_created_date', 'user_id', 'product_id', 'product_name', 'product_quantity'], 'required'],
            [['order_created_date'], 'safe'],
            [['user_id', 'product_id', 'product_quantity'], 'integer'],
            [['product_name'], 'string', 'max' => 255]

    	];


    }

    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_created_date' => 'Order Created Date',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'product_quantity' => 'Product Quantity',
        ];
    }

    public function save()
    {

        $this->load(Yii::$app->request->post()) 


        
        $model = new Order();

        $model->order_created_date = $date;
        $model->user_id = $id;
        $model->product_quantity = $this->product_quantity;
        $model->prduct_name = $product_name;
        $model->product_id = $product_id;
        $model->save();


    }

   
}