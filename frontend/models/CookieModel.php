<?php
	
	namespace frontend\models;

	use Yii;
	use frontend\models\Cookie;
	
	class CookieModel {

		private $_cookie;

		public function checkCookie() {

			$cookies = Yii::$app->request->cookies;

			if (($cookie = $cookies->get('cookiehash')) !== null) {

    			//$this->_cookie = $cookie->value;

				$this->set_Cookie($cookie->value);

    			if($this->checkCookieDb()) {

    				$this->setSession();
    				return true;
    			} else {

    				$this->setCookie();
    				return true;
    			}

			} else {

					$this->setCookie();
					return false;
			}

		}

		public function set_Cookie($data) {

			$this->_cookie = $data;

		}

		public function get_Cookie() {

			return $this->_cookie;

		}

		public function setSession($data = null) {

			$session = Yii::$app->session;

			if($data = null) {
    			$session->set('cookiehash', $this->get_Cookie());
    		} else {
    			$session->set('cookiehash', $data);
    		}	

		}

		public function getRandomHash() {

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

		public function checkCookieDb() {

			$model = Cookie::find()->where(['cookie_hash' => $this->get_Cookie()])->one();

			if($model) {

				return true;

			} else {

				return false;
			}
		}

		public function setCookie() {

			$model = new Cookie;

			$cookies = Yii::$app->response->cookies;

			$randomHash = $this->getRandomHash();

			$cookies->add(new \yii\web\Cookie([

    			'name' => 'cookiehash',
    			'value' => $randomHash,

			]));

			$this->setSession($randomHash);

			$model->cookie_hash = $randomHash;

			$model->cookie_expire = date('Y-m-d');

			$model->save();


		}
	}



?>