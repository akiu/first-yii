<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cookie".
 *
 * @property integer $cookie_id
 * @property string $cookie_hash
 * @property string $cookie_expire
 */
class Cookie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cookie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cookie_hash', 'cookie_expire'], 'required'],
            [['cookie_expire'], 'safe'],
            [['cookie_hash'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cookie_id' => 'Cookie ID',
            'cookie_hash' => 'Cookie Hash',
            'cookie_expire' => 'Cookie Expire',
        ];
    }
}
