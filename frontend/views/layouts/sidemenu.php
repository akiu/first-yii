<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use frontend\models\Category;
use yii\helpers\ArrayHelper;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Anon Shop.com',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $dropDownItems = [];

            $items = Category::find()->all();

            foreach($items as $data) {

                $dropDownItems[] = ['label' => $data->category_name, 'labelTemplate' =>'{<h1>hahaha</h1>}', 'url' => ['customer/viewbycat', 'cat' => $data->category_name]];
            }

            $menuItems = [
                ['label' => 'Home', 'url' => ['/customer/index']],
               
                ['label' => 'Category', 'items' => $dropDownItems],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                
                $menuItems[] = [
                    'label' => 'Profile',
                    'url' => ['/customer/profile'],
                    
                ];

                $menuItems[] = [
                    'label' => 'Cart',
                    'url' => ['/customer/cart'],
                    
                ];

                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];

                 
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container-fluid" style="margin-top: 100px; margin-left: 30px; margin-right: 30px;">
            

            <div class="row">

                <div class="col-md-2 sidemenu" style="border: 1px solid black; padding: 10px; border-radius: 10px;">

                    
                     <?= Html::beginForm(['customer/search'], 'post', ['role' => 'form', 'id' => 'form-search']) ?>
                         
                        <div class="form-group">

                                <?= Html::label('Min Price', '', ['id' => 'min-price']) ?>

                                <?= Html::input('number','minprice', '', ['id' => 'input-nama', 'type' => 'number', 'step' => '1000', 'min' => '1000', 'max' => '10000000000', 'autocomplete' => 'off', 'class' => 'form-control', 'required' => '']) ?>             
                        </div>

                        <div class="form-group">

                                <?= Html::label('Max Price', '', ['id' => 'min-price']) ?>
                                <?= Html::input('number', 'maxprice', '', ['id' => 'max-input', 'autocomplete' => 'off', 'class' => 'form-control', 'required' => '', 'type' => 'number', 'step' => '1000', 'min' => '1000', 'max' => '1000000000']) ?> 
                        </div>

                        <div class="form-group">

                                <?= Html::label('Category', '', ['id' => 'min-price']) ?>
                                <?= Html::dropDownList('category', '', ArrayHelper::map(Category::find()->all(), 'category_id', 'category_name'), ['class' => 'form-control']) ?> 
                        </div>                
                            

                            

                                <?= Html::submitButton('Search Product', ['class' => 'btn btn-primary']) ?>

                           

                    <?= Html::endForm() ?>
            
                    


                </div>

                <div class="col-md-1">

                  

                </div>

                <div class="col-md-9">

                    <?= $content ?>

                </div>
                    
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
