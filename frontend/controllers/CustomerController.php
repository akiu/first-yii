<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use common\models\Product;
use yii\data\Pagination;
use frontend\models\Category;
use common\models\Image;
use yii\filters\AccessControl;
use frontend\models\CookieModel;
use yii\web\NotFoundHttpException;
use frontend\models\TableOrder;
//use common\models\TableOrder;

/**
 * Site controller
 */
class CustomerController extends Controller
{


	public function behaviors() {

		return [

			
            'access' => [
                'class' => AccessControl::className(),
                
                'rules' => [
                    [
                        'actions' => ['viewbyslug', 'viewbycat', 'index', 'profile', 'cart', 'search', 'addcart'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                    	'actions' => ['index', 'viewbycat', 'search'],
                    	'allow' => true,
                    	'roles' => ['?'],
                    ],
                ],
            ],


		];

	}

		public function actionIndex() {

			$this->layout = "sidemenu";	

			$model = Product::find()->all();

			return $this->render('index', ['model' => $model]);
		}

		public function actionViewbycat($cat) {

			$this->layout = "sidemenu";	

			$category = Category::find()->where(['category_name' => $cat])->one();

			if(!$category) {

				throw new NotFoundHttpException('The requested page does not exist.');

			} else {

				$product = Product::find()->where(['product_category' => $category->category_id])->all();

				return $this->render('index', ['model' => $product]);

			}

			



		}

		public function actionSearch() {

			$this->layout = "sidemenu";	

			if(Yii::$app->request->isPost) {

			$min = floatval(yii::$app->request->post('minprice'));
			$max = floatval(yii::$app->request->post('maxprice'));
			$category = yii::$app->request->post('category');	

			//$cat = Category::find()->where(['category_name' => $category])->one();

			$model = $this->getModel($min, $max, $category);

			return $this->render('index', ['model' => $model]);
			
			} else {

				throw new NotFoundHttpException('The requested page does not exist.');
			}
		}

		public function actionViewbyslug($slug) {

			$this->layout = "main";	

			$model = Product::find()->where(['product_slug' => $slug])->one();

            if(!$model) {

                throw new NotFoundHttpException('The requested page does not exist.');
        

            } else {

            $image = Image::find()->where(['product_id' => $model->product_id])->all();

            return $this->render('viewbyslug', ['model' => $model, 'image' => $image]);

            }
		}

		public function actionCart() {

				return $this->render('cart');

		}

		public function actionAddcart() {

			if(Yii::$app->request->isPost) {

				$order = new TableOrder;

				$product_name = Yii::$app->request->post('productname');
				$quantity = Yii::$app->request->post('quantity');
				$uid = Yii::$app->user->getId();

				$order->saveOrder($product_name, $quantity, $uid);
				//echo $product_name;
				//echo $quantity;
				//echo $uid;

			}

		}

		public function actionViewcart() {

			$cart = TableOrder::find()->where(['user_id' => Yii::$app->user->getId()])->all();
			
			return $this->render('viewcart', ['cart' => $cart]);	

		}

		public function actionDeleteorder() {


		}

		public function actionEditorder() {


		}

		public function actionProfile() {

				return $this->render('profile');
		}



		public function getModel($minPrice = null, $maxPrice = null, $cat) {



			if($minPrice == null && $maxPrice == null) {

				$model = Product::find()->where(['product_category' => $cat])->all();

				return $model;

			}

			if($minPrice !== null && $maxPrice !== null) {

				$model = Product::find()->where(['product_category' => $cat])->andWhere(['>', 'product_price', $minPrice])->andWhere(['<', 'product_price', $maxPrice])->all();

				return $model;
			} 

		}


}