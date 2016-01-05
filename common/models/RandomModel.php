<?php

	class RandomModel {

		/*

			getRandomString : untuk mendapatkan string huruf secara acak
			parameter

			$max : default 61 , yaitu jumlah kemungkinan random string.
			$maxString : jumlah string yang akan digunakan	

		*/


		public static function getRandomString($max = 61, $maxString = 250) {

			$character = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w',
    			'x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X'
    			,'Y','Z','1','2','3','4','5','6','7','8','9','0');

    		$huruf = '';

        		for ($a = 1; $a <= $maxString; $a++ )

         			{

            		$huruf .= $character[rand(0, $max)]; 

		 			}

				return $huruf;  

		}

		public static function getRandomHash($max = 61, $maxString = 250) {

			return hash(hash_algos()[rand(0,42)], self::getRandomString($max, $maxString));

		}




}