<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Profile;

/**
 * ContactForm is the model behind the contact form.
 */
class ProfileModel extends Model
{

	public $first_name;
	public $last_name;
	public $address;
	public $mob_num;
	public $bank_name;
	public $bank_acc_holder;
	public $bank_acc_num;
	public $birth_date;

	public function rules() {

		return [
            [['first_name', 'last_name', 'address', 'mob_num', 'bank_name', 'bank_acc_holder', 'bank_acc_num', 'birth_date'], 'required'],
            [['birth_date'], 'safe'],
            [['first_name', 'last_name', 'address', 'mob_num', 'bank_name', 'bank_acc_holder', 'bank_acc_num'], 'string', 'max' => 255]
        ];
	}

	public function attributeLabels() {

		return [

			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'address' => 'Address',
			'mob_num' => 'Mobile',
			'bank_name' => 'Bank Name',
			'bank_acc_holder' => 'Bank Account Name',
			'bank_acc_num' => 'Bank Account Number',
			'birth_date' => 'Birth Date',


		];
	}

	public function getUserHash() {

		$model = Profile::find
	}

}