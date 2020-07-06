<?php if(!empty($_SESSION['admin']))
  $contenteditable='true';
  else
  $contenteditable='false';?>

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

<script src="public/js/script.js"></script>