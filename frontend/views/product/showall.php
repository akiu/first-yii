<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use yii\helpers\HtmlPurifier;
use yii\widgets\LinkPager;


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
   
   <?php
echo "<div class=\"row\">";
   	foreach ($product as $x)
			{
 
 	
 			echo $this->render('showeach', [
        		'products' => $x,
            'order' => $order,
    			]); 

			}
echo "</div>";      
   ?>


<?= LinkPager::widget(['pagination' => $pagination]) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>