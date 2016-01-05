<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "table_category".
 *
 * @property integer $category_id
 * @property string $category_name
 *
 * @property TableProduct[] $tableProducts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTableProducts()
    {
        return $this->hasMany(TableProduct::className(), ['product_category' => 'category_id']);
    }
}
