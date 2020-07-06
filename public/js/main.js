
$('body').on('change', '.butNead input', function(){
    var checked = $('.butNead input:checked'),
    data = '';
    checked.each(function(){
        data+=this.value+',';
    });
    if(data){
        $.ajax({
            url: location.href,
            data: {filter: data},
            type:'GET',
            
            beforeSend:function(){
                $('.tasks').hide();
            },
            success: function(res){
                $('.tasks').html(res).fadeIn();
                var url = location.search.replace(/filter(.+?)(&|$)/g, '');
                
                var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                newURL=newURL.replace('&&','&');
                newURL=newURL.replace('?&', '?');
                history.pushState({},'', newURL);

            },
            error: function(){
                alert("Ошибка!");
            }
        });
    }
    else{
        window.location = location.pathname;
    }
  
});


