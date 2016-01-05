<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;

$this->title = "Create Product";
?>

<h1><?= Html::encode($this->title) ?></h1> 

<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data', 'class' => 'form-group']]) ?>
	<?= $form->errorSummary($model); ?>
	<?= $form->field($model, 'name'); ?>
	<?= $form->field($model, 'price'); ?>
	<?= $form->field($model, 'category')->dropDownList(ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name')); ?>
	<?= $form->field($model, 'slug')->textInput(['onkeypress' => "return inputLimiter(event);",  "style" => "text-transform: lowercase;"]); ?>
	<?= $form->field($model, 'description')->textArea(['rows' => "5"]); ?>

	<hr />

	<?= $form->field($model, 'image')->fileInput(); ?>
	<?= $form->field($model, 'image2')->fileInput(); ?>
	<?= $form->field($model, 'image3')->fileInput(); ?>
	<?= $form->field($model, 'image4')->fileInput(); ?>

	<hr />
	<div class="form-group">
          <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end() ?>

<?php

$script = <<< JS

	function inputLimiter(e) {
    var AllowableCharacters = '';

    AllowableCharacters='abcdefghijklmnopqrstuvwxyz-123456789';

    //if (allow == 'Letters'){AllowableCharacters=' ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';}
    //if (allow == 'Numbers'){AllowableCharacters='1234567890';}
    //if (allow == 'NameCharacters'){AllowableCharacters=' ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-.\'';}
    //if (allow == 'NameCharactersAndNumbers'){AllowableCharacters='1234567890 ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-\'';}

    var k = document.all?parseInt(e.keyCode): parseInt(e.which);
    if (k!=13 && k!=8 && k!=0){
        if ((e.ctrlKey==false) && (e.altKey==false)) {
        return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
        } else {
        return true;
        }
    } else {
        return true;
    }
}

function preventDrag(event)
{
 if(event.type=='dragenter' || event.type=='dragover' || //if drag over event -- allows for drop event to be captured, in case default for this is to not allow drag over target
    event.type=='drop') //prevent text dragging -- IE and new Mozilla (like Firefox 3.5+)
 {
  if(event.stopPropagation) //(Mozilla)
  {
   event.preventDefault();
   event.stopPropagation(); //prevent drag operation from bubbling up and causing text to be modified on old Mozilla (before Firefox 3.5, which doesn't have drop event -- this avoids having to capture old dragdrop event)
  }
  return false; //(IE)
 }
}

//attach event listeners after page has loaded
window.onload=function()
{
 var myTextInput = document.getElementById('productmodel-slug'); //target any DOM element here

 if(myTextInput.addEventListener) //(Mozilla)
 {
  //myTextInput.addEventListener('dragenter', handleEvents, true); //precursor for drop event
  //myTextInput.addEventListener('dragover', handleEvents, true); //precursor for drop event
  myTextInput.addEventListener('drop', preventDrag, true);
 }
 else if (myTextInput.attachEvent) //(IE)
 {
  myTextInput.attachEvent('ondragenter', preventDrag);
  myTextInput.attachEvent('ondragover', preventDrag);
  myTextInput.attachEvent('ondrop', preventDrag);
 }
}
 


JS;

$this->registerJs($script, 1);

$script2 = <<< JS
    
    $("#productmodel-slug").bind("copy paste", function(e) {
        e.preventDefault();
    });

JS;

$this->registerJs($script2, 3);

?>