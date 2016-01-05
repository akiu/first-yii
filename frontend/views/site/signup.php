<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
   

    

    <div class="row">
     <div class="col-md-4">
            
        </div>
        <div class="col-md-4 signup-box">
         <h1><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'captcha')->widget(Captcha::classname(), [
                        'template' => '{image}{input}',
                    ]); ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary tbl-signup', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
         <div class="col-md-4">
            
        </div>
    </div>
</div>

<?php

$css = <<< CSS

    

    .signup-box {

        border: solid 1px black;
        margin-top: 60px;
        padding: 10px;
        border-radius: 30px;
        text-align: center;

    }

    .tbl-signup {


        width: 200px;
        background-color: white;
        color: black;
        border: 1px solid black;
    }

    .tbl-signup:hover {

         background-color: black;
         color: white;
    }

    

    


CSS;


$this->registerCss($css);

?>