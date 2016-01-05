<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $profile_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $mobile_number
 * @property string $bank_name
 * @property string $bank_account_holder
 * @property string $bank_account_number
 * @property string $birth_date
 * @property string $user_hash
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address', 'mobile_number', 'bank_name', 'bank_account_holder', 'bank_account_number', 'birth_date', 'user_hash'], 'required'],
            [['birth_date'], 'safe'],
            [['first_name', 'last_name', 'address', 'mobile_number', 'bank_name', 'bank_account_holder', 'bank_account_number', 'user_hash'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => 'Profile ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'mobile_number' => 'Mobile Number',
            'bank_name' => 'Bank Name',
            'bank_account_holder' => 'Bank Account Holder',
            'bank_account_number' => 'Bank Account Number',
            'birth_date' => 'Birth Date',
            'user_hash' => 'User Hash',
        ];
    }
}
