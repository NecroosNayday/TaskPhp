<?php 

namespace app\controllers;

use InternetShop\Cache;

class MainController extends AppController {
	public function indexAction(){
 
		$this->setMeta('shop_name', 'Описание...', 'Ключевик');

		
	}
}