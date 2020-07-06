<?php
namespace app\models;

class Task extends AppModel{
    
    public $attributes = [
		'name'=>'',
        'email' =>'',
        'message' =>'',
    ];

    public static function getFilter(){
      $filter = null;
      if(!empty($_GET['filter'])){
        
          $filter=preg_replace("#[^\d]+#",' ',$_GET['filter'] );
          $filter = rtrim($filter, ',');
          $filter=str_replace("1",'name',$filter);
          $filter=str_replace("2",'email',$filter);
          $filter=str_replace("3",'status',$filter);
          $filter=str_replace("4",'desc',$filter);
          $filter=str_replace("5",'asc',$filter);
      }
      return $filter;
    }

    

}
