<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */





   

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login" style="text-align: center;">
    

    

    <div class="row">
     <div class="col-md-4">
           
        </div>
        <div class="col-md-4" id="login-box">
            <h2><?= Html::encode($this->title) ?></h2>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary tbl-submit', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
         <div class="col-md-4">
            
        </div>
    </div>

</div>


<?php

$css = <<< CSS

    .tbl-submit {

        width: 200px;
        background-color: white;
        color: black;
        border: 1px solid black;
    }

    .tbl-submit:hover {

        background-color: black;
        color: white;
    }

    #login-box {

        border: solid 1px black;
        margin-top: 60px;
        padding: 10px;
        border-radius: 30px;


    }

    

    


CSS;


$this->registerCss($css);

?>
