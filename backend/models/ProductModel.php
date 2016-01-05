<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Product;
use yii\web\UploadedFile;
//use common\components\UnspaceValidator;

class ProductModel extends Model
{
	public $name;
	public $price;
	public $category;
	//public $created_date;
	//public $admin_id;
	public $description;
	public $slug;
	public $image;
	public $image2;
	public $image3;
	public $image4;

	public function rules() {

		return [

			[['name', 'price', 'category', 'description', 'image', 'slug'], 'required'],
			[['image', 'image2', 'image3', 'image4'], 'file', 'extensions' => ['png', 'jpg', 'jpeg']],
			['slug', 'in', 'message' => 'slug sudah dipakai', 'not' => true, 'range' => Product::find()->select('product_slug')->asArray()->column()],
			[['price'], 'double'],
			[['name', 'description', 'slug'], 'string'],
			[['name', 'slug'], 'string', 'max' => 255],
			[['slug'], 'trim'],
			['slug', function($attribute, $param) {

				$result = strpos($this->attribute, " ");
				if($result) {

					$this->addError($attribute, "Dilarang ada spasi");
				}
			}]


		];


	}

	public function attributeLabels()
    {
        return [
            //'product_id' => 'Product ID',
            'name' => 'Product Name',
            'price' => 'Product Price',
            'category' => 'Product Category',
            //'product_created_date' => 'Product Created Date',
            //'admin_id' => 'Admin ID',
            'description' => 'Product Description',
            'slug' => 'Product Slug',
            'image' => 'Main Image',
            'image2' => 'Second Image',
            'image3' => 'Third Image',
            'image4' => 'Fourth Image',
        ];
    }	

	public function simpan() {

			$model = new Product;

			$model->product_name = $this->name;
			$model->product_price = $this->price;
			$model->product_category = $this->category;
			$model->product_created_date = date('Y-m-d');
			$model->product_description = $this->description;
			$model->admin_id = Yii::$app->user->getId();
			$model->product_slug = $this->slug;
			$model->save();

			$this->uploadsAndSave();


			
		

	}

	public function uploadsAndSave() {

			$path = Yii::getAlias('@common') .'/web/uploads/';

			$this->image = uploadedFile::getInstance($this, 'image');

			$this->image2 = uploadedFile::getInstance($this, 'image2');

			$this->image3 = uploadedFile::getInstance($this, 'image3');

			$this->image4 = uploadedFile::getInstance($this, 'image4');

			if($this->image !== null) {

				$nama = $this->getRandomName();

				$fullPath = $path . $nama . "." . $this->image->extension;

				$this->image->saveAs($fullPath);

				$this->saveImageNameToDb($fullPath);
			}

			if($this->image2 !== null) {

				$nama = $this->getRandomName();

				$fullPath = $path . $nama . "." . $this->image2->extension;

				$this->image2->saveAs($fullPath);

				$this->saveImageNameToDb($fullPath);
			}

			if($this->image3 !== null) {

				$nama = $this->getRandomName();

				$fullPath = $path . $nama . "." . $this->image3->extension;

				$this->image3->saveAs($fullPath);

				$this->saveImageNameToDb($fullPath);
			}

			if($this->image4 !== null) {

				$nama = $this->getRandomName();

				$fullPath = $path . $nama . "." . $this->image4->extension;

				$this->image4->saveAs($fullPath);

				$this->saveImageNameToDb($fullPath);
			}

	}

	public function getRandomName() {

    $character = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w',
    'x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X'
    ,'Y','Z','1','2','3','4','5','6','7','8','9','0');

    $huruf = '';

        for ($a = 1; $a <= 250; $a++ )

         {

            $huruf .= $character[rand(0, 61)]; 

		 }

	return hash('sha256', $huruf);	  

	}

	public function saveImageNameToDb($url) {

		$connection = new \yii\db\Connection(['dsn' => 'mysql:dbname=yii2advanced2;host=127.0.0.1', 
            'username' => 'root', 
            'password' => 'root']);

		$connection->createCommand()->insert('product_image', [

				'image_url' => $url,
				'product_id' => $this->getProductId(),

		])->execute();
	}

	public function getProductId() {

		$pid = Product::find()->where([ 'product_name' => $this->name ])->one();
		return $pid->product_id;
	}

	public function validateSlug() {

		$hasil = strpos($this->slug, " ");
		

		if($hasil) {

			$this->addError('slug', 'Slug tidak boleh ada spasi');
		}
	}
}