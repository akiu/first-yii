<?php

namespace frontend\models;

use Yii;
use common\models\Product;
/**
 * This is the model class for table "table_order".
 *
 * @property integer $order_id
 * @property string $order_created_date
 * @property integer $user_id
 * @property integer $product_id
 * @property string $product_name
 * @property integer $product_quantity
 * @property string $total
 *
 * @property User $user
 * @property TableProduct $product
 */
class TableOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_created_date', 'user_id', 'product_id', 'product_name', 'product_quantity', 'total'], 'required'],
            [['order_created_date'], 'safe'],
            [['user_id', 'product_id', 'product_quantity'], 'integer'],
            [['total'], 'number'],
            [['product_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_created_date' => 'Order Created Date',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'product_quantity' => 'Product Quantity',
            'total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(TableProduct::className(), ['product_id' => 'product_id']);
    }

    public function saveOrder($product_name, $quantity, $uid) {

            $this->order_created_date = date('Y-m-d');
            $this->user_id = $uid;
            $this->product_id = $this->getProductData($product_name)[0];
            $this->product_name = $product_name;
            $this->product_quantity = $quantity;
            $this->total = $quantity * $this->getProductData($product_name)[1];
            if($this->save()) {

                return true;

            } else {

                return false;
            }
    }

    public function getProductdata($product_name) {

            $data = Product::find()->where(['product_name' => $product_name])->one();
            return array($data->product_id, $data->product_price);
    }
}
