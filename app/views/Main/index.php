<div class="content">
		<div class="container">
    <?php if(isset($_SESSION['error'])):?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <?php endif;?>
    <?php if(isset($_SESSION['success'])):?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <?php endif;?>
    </div>
</div>
	

<?php if(!empty($_SESSION['admin'])): ?>
 <?php $contenteditable='true';?>
 <div class="d-flex justify-content-end">
<a  class="btn btn-primary mt-2 mb-5 mr-3 " href="main/logout" >Выход</a>
</div>

<?php else: ?>
  <?php $contenteditable='false';?>
<div class="d-flex justify-content-end">
<button type="button" class="btn btn-primary mt-2 mb-5 mr-3 " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Вход</button>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form id="autor_form" method="post" action="main/login" role="form">

<div class="col">
<div class="form-group">
<label for="form_login">Логин *</label>
<input id="form_login" type="text" name="login" class="form-control" placeholder="Введите логин *" required="required" data-error="Login is required.">
<div class="help-block with-errors"></div>
</div>
</div>
   <div class="col">
       <div class="form-group">
           <label for="form_password">Пароль *</label>
           <input id="form_password" type="password" name="password" class="form-control" placeholder="Введите пароль *" required="required" data-error="Valid password is required.">
           <div class="help-block with-errors"></div>
       </div>
   </div>
   <div id="errorMess"></div>

   <div class="modal-footer">
<input type="submit" class="btn btn-success btn-send" value="Send message">
</div>
</div>
<?php endif; ?>


</form>
      </div>
      </div>
    </div>
  </div>
</div>
<??>

 <div class="container">

<div class="row justify-content-center">

<div class="col-lg-8 col-lg-offset-2">

<h1 class="text-center">Задачник</h1> 



<form id="contact-form" method="post" action="main/task" role="form">

<div class="messages mt-5"></div>

<div class="controls">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="form_name">Имя *</label>
<input id="form_name" type="text" name="name" class="form-control" placeholder="Введите ваше имя *" required="required" data-error="Firstname is required.">
<div class="help-block with-errors"></div>
</div>
</div>


   <div class="col-md-6">
       <div class="form-group">
           <label for="form_email">Email *</label>
           <input id="form_email" type="email" name="email" class="form-control" placeholder="Введите ваш email *" required="required" data-error="Valid email is required.">
           <div class="help-block with-errors"></div>
       </div>
   </div>
</div>



<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="form_message">Задача *</label>
<textarea id="form_message" name="message" class="form-control" placeholder="" rows="4" required="required" data-error=""></textarea>
<div class="help-block with-errors"></div>
</div>
</div>

<div class="col-md-12">
<div class="form-group">

<div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"></div>
</div>
</div>

<div class="col-md-12">
<input type="submit" class="btn btn-success btn-send" value="Отправить">
</div>

</div>

</div>

</form>

</div><!-- /.col-lg-8 col-lg-offset-2 -->

</div> <!-- /.row-->
</div>



<div class="container">

<div class="butNead">

  <div class="btn-group btn-group-toggle mt-5 ">

    <label class="btn btn-secondary">
      <input type="radio" name="options" id="option1" value="1" autocomplete="off"> Имя
    </label>
    <label class="btn btn-secondary  ">
      <input type="radio" name="options" id="option2" value="2" autocomplete="off"> Email
    </label>
    <label class="btn btn-secondary  ">
      <input type="radio" name="options" id="option3" value="3" autocomplete="off"> Статус
    </label>
  </div>

  <div class="btn-group btn-group-toggle mt-5 ml-5 ">
  <label class="btn btn-secondary  ">
      <input type="radio" name="desc" id="option3" value="4" autocomplete="off"> По убыванию
    </label>
    <label class="btn btn-secondary  ">
      <input type="radio" name="desc" id="option3" value="5" autocomplete="off"> По возростанию
    </label>
    </div>

  </div>
<div class="tasks">
<?php if($messages): ?>
    <div class="card-deck mt-5">
    <?php foreach($messages as $message):?>
        <div class="card">
       
            <div class="card-body">
              <div class="d-flex justify-content-between">
              <h5 class="card-title "><?=htmlspecialchars($message->name);?></h5>
            <small class="text-muted "><?if($message->changed==1) echo "отредактировано администратором";?></small>
             
             </div>
                <p class="card-text edit" data-id= <?=$message->id;?> contenteditable=<?=$contenteditable;?>><?=htmlspecialchars($message->message);?></p>
            </div>
           
            
            <div class="card-footer">
                <small class="text-muted"><?=htmlspecialchars($message->email);?></small>
                <?php if(!empty($_SESSION['admin'])):?>
                <div class="d-flex justify-content-end"><input type="checkbox" class="checker" value=<?=$message->status;?> data-id= <?=$message->id;?>><?php if($message->status=='0') echo "не выполнено"; else echo "выполнено"; ?></div>
                <?php else:?>
                    <div class="d-flex justify-content-end"><p><?php if($message->status=='1')  echo "выполнено"; ?></p></div>
                <?php endif;?>
            </div>
            <?php if(!empty($_SESSION['admin'])): ?>
            
           
            
            <?php endif;?>
        </div>
        <?php endforeach;?>
    </div>
<?php endif;?>
<nav aria-label="Page navigation example">

        <?php if($pagination->countPages > 1):?>

          
        <?=$pagination;?>
        <?php endif;?>
</nav>
</div>
</div>
<div id="loader"><span></span></div>
<div id="mes-edit"></div>
