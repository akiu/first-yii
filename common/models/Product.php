<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "table_product".
 *
 * @property integer $product_id
 * @property string $product_name
 * @property string $product_price
 * @property integer $product_category
 * @property string $product_created_date
 * @property integer $admin_id
 * @property string $product_description
 * @property string $product_slug
 *
 * @property ProductImage[] $productImages
 * @property TableOrder[] $tableOrders
 * @property TableCategory $productCategory
 * @property Admin $admin
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_price', 'product_category', 'product_created_date', 'admin_id', 'product_description', 'product_slug'], 'required'],
            [['product_price'], 'double'],
            [['product_category', 'admin_id'], 'integer'],
            [['product_created_date'], 'safe'],
            [['product_description'], 'string'],
            [['product_name', 'product_slug'], 'string', 'max' => 255],
            [['product_slug'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'product_price' => 'Product Price',
            'product_category' => 'Product Category',
            'product_created_date' => 'Product Created Date',
            'admin_id' => 'Admin ID',
            'product_description' => 'Product Description',
            'product_slug' => 'Product Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTableOrders()
    {
        return $this->hasMany(TableOrder::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(TableCategory::className(), ['category_id' => 'product_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'admin_id']);
    }
}
