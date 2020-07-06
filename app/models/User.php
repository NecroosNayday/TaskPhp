<?php
namespace app\models;

class User extends AppModel{
    
    public $attributes = [
		'login'=>'',
		'password' =>'',
    ];
    
    public function login(){
      $login=!empty(trim($_POST['login'])) ? trim($_POST['login']) :null;
      $password=!empty(trim($_POST['password'])) ? trim($_POST['password']) :null;
      if($login && $password){
        $user = \R::findOne('users', "login = ? AND role='admin'", [$login]);
      }
      if($user){
        if(password_verify($password, $user->password)){
          foreach($user as $k=>$v){
            if($k!='password') $_SESSION['admin'][$k] = $v;
          }
          return true;
          
        }
      }
      return false;
      
    }
    public static function checkAuth(){
      return isset($_SESSION['admin']);
    }

    

}
