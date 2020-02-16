<?php 
namespace InternetShop\base;

use InternetShop\Db;

abstract class Model{

	public $attributes = [];
	public $errors = [];
	public $rules = [];
	
	public function __construct(){
		Db::instance();
	}

}