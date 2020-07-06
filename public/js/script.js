$(function(){
    var oldVal, newVal, id;

    $('.edit').keypress(function(e){
        if(e.which==13){
            newVal = $(this).text();
        if(newVal != oldVal){
            $.ajax({
                url: 'main/admin',
                type:'POST',
                data: {new_val:newVal, id:id},
                beforeSend:function(){
                  $('#loader').fadeIn();      
                },
                success: function(res){
                   if(res=='no'){
                    $('#mes-edit').text('Изменения не будут внесены').delay(500).fadeIn(1000,function(){
                        $('#mes-edit').delay(1000).fadeOut();
                        setTimeout(function(){
                            window.location.reload(1);
                         }, 2000);
                    });
                   }
                   if(res=='yes'){
                    $('#mes-edit').text('Изменения cохранены').delay(500).fadeIn(1000,function(){
                        $('#mes-edit').delay(1000).fadeOut();
                    });
                   }
                    
                    
                },
                error:function(){
                    alert('error');
                },
                complete: function(){
                    $('#loader').delay(500).fadeOut();  
                }
            });
        }else{
            $('#mes-edit').text('Внесите изменения').delay(500).fadeIn(1000,function(){
                $('#mes-edit').delay(1000).fadeOut();
            });
        }
            return false;
        }
    });

    
    $('input:checkbox:not(:checked)').each(function(){
        if($(this).val()=='1'){
            $(this).prop('checked', true);
        }
    });

    $('.checker').click(function(){
        idcheck = $(this).data('id');
        oldStatus = this.value;
        newStatus='';
        if ($(this).is(':checked')){
            newStatus=1;
            if(oldStatus!=newStatus){

                $.ajax({
                    url: 'main/admin',
                    type:'POST',
                    data: {new_status:newStatus, idckeck:idcheck},
                    beforeSend:function(){
                    
                      $('#loader').fadeIn();
                           
                    },
                    success: function(res){
                        
                        if(res=='no'){
                         $('#mes-edit').text('Изменения не будут внесены').delay(500).fadeIn(1000,function(){
                             $('#mes-edit').delay(1000).fadeOut();
                         });
                         setTimeout(function(){
                            window.location.reload(1);
                         }, 5000);
                        }
                        if(res=='yes'){
                         $('#mes-edit').text('Изменения cохранены').delay(500).fadeIn(1000,function(){
                             $('#mes-edit').delay(1000).fadeOut();
                         });
                        }
                         
                         
                     },
                    error:function(){
                        alert('error');
                    },
                    complete: function(){
                        $('#loader').delay(500).fadeOut();  
                    }
                });

            }
        } 
    });  
    
    $('.edit').focus(function(){
        oldVal = $(this).text();
        id = $(this).data('id');
       
    }).blur(function(){
       
    });

});

