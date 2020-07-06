<?php 

namespace app\controllers;

use TaskManager\Cache;
use TaskManager\App;
use TaskManager\libs\Pagination;

use app\Models\User;
use app\Models\Task;

class MainController extends AppController {

	public function indexAction(){

		$page = isset($_GET['page'])? (int)$_GET['page']:1;
		$perpage = App::$app->getProperty('pagination');
		

		$sql_part ='';
		if(!empty($_GET['filter'])){

			$filter= Task::getFilter();
			$filter = explode(" ", $filter);
			if($filter[0]=='asc'||$filter[0]=='desc'){
				$filter[1]=$filter[0];
				$filter[0]='name';
			}
			$sql_part = "ORDER BY $filter[0] $filter[1] ";
		}

		
		

		

		$total =\R::count('messages');
		$pagination = new Pagination($page, $perpage,$total);
		$start=$pagination->getStart();
	
		$messages = \R::find('messages'," $sql_part LIMIT $start,$perpage");
		
		
		if($this->isAjax()){
			
			$this->loadView('filter',compact('messages', 'pagination'));
		}
		$this->setMeta('Task', 'Описание...', 'Ключевик');
		$this->set(compact('messages', 'pagination'));

		
	
	}
	public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
				$_SESSION['success']='Вы успешно авторизованы';
			
				
            }else{
                $_SESSION['error']='Логин или пароль введены неверно';
			}
			header("Location:/");
			
        }
    }

    public function logoutAction(){
        
		if(isset($_SESSION['admin'])) $_SESSION = array(); session_destroy();
	
		header("Location:/");
		exit;
	}
	
	public function taskAction(){
		if(!empty($_POST)){
			$task = new Task();
			$data = array_map ( 'htmlspecialchars_decode' , $_POST );
			
			$task->load($data);
			if($task->save('messages')){
				$_SESSION['success']='Задача добавлена';
				header("Location:/");
			}
			
		}
	}

	public function adminAction(){
		if(!empty($_POST['new_val'])){
			if(isset($_SESSION['admin'])){
			   $id = $_POST['id'];
			   $new_val = $_POST['new_val'];
			   
	   
			   $changed=1;
				//$taskUpdate= Task::updateTask();
				//$sql_task = "Update $taskUpdate";
				\R::exec( 'UPDATE `messages` SET `message`= :mess, `changed`=:changed WHERE `id` = :id',array(
					':mess'=>$new_val,
					':id'=>$id,
					':changed'=>$changed
				   
				) );
				echo 'yes';
				exit;
			}
			echo 'no';
			exit;
   }
   

   if(!empty($_POST['new_status'])){
	if(isset($_SESSION['admin'])){
		$id = $_POST['idckeck'];
		$new_val = $_POST['new_status'];
		\R::exec( 'UPDATE `messages` SET `status`= :statuss WHERE `id` = :id',array(
		':statuss'=>$new_val,
		':id'=>$id
		) );
		echo 'yes';
		exit;
	}
	echo 'no';
	exit;
}
}
	

	
}