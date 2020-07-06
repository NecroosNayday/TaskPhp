<?php 
namespace TaskManager\base;

use TaskManager\Db;

abstract class Model{

	public $attributes = [];
	public $errors = [];
	public $rules = [];
	
	public function __construct(){
		Db::instance();
	}
	public function save($table){
		$tbl = \R::dispense($table);
		foreach($this->attributes as $name =>$value){
			$tbl->$name=$value;
		}
		return \R::store($tbl);
	}

	public function load($data){
		foreach($this->attributes as $name =>$value){
			if(isset($data[$name])){
				$this->attributes[$name] = $data[$name];
			}
		}
	}
}