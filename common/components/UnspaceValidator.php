<?php
namespace common\components;
use yii\validators\Validator;


class UnspaceValidator extends Validator {

	public function init() {
	parent::init();
	$this->message = "spasi dilarang digunakan dalam slug";
	}

	public function validateAttribute($model, $attribute) {

	$value = $model->$attribute;

	$result = strpos($value, " ");

	if ($result) {

	$model->addError($attribute, $this->message);
	}

	}

	public function clientValidateAttribute($model, $attribute, $view) {

	
	$message = json_encode($this->message);
	return <<<JS

		var pos = value.search(" ");

		var c = 0;

		if( pos !== -1 ) {

			c = true;

		} else {

			c = false;
		}

		if (!c) {
		messages.push($message);
	}
JS;
	}
}

?>