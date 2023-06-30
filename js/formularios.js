$(function(){
    $('body').on('submit','form.ajax-form',function(){
        //test
        // alert('working!');
         
      var form = $(this);
        $.ajax({
          beforeSend:function(){
            //console.log('enviando');
            $('.overlay-loading').fadeIn();
          },
           url:include_path+'ajax/formularios.php',
           method:'post',
           dataType:'json',
           data:form.serialize()
       }).done(function(data){
          if(data.sucesso){
            //console.log(data.retorno);
            //console.log('enviado')
            $('.overlay-loading').fadeOut();
            $('.sucesso').fadeIn();
            setTimeout(function(){
              $('.sucesso').fadeOut();
            },3000);
          }else{
            //console.log("Ocorreu um erro ao enviar o e-mail");
            $('.overlay-loading').fadeOut();
            $('.erro').fadeIn();
            setTimeout(function(){
              $('.erro').fadeOut();
            },3000);
          }
         
          //console.log("Retorno feito com sucesso");
       });

       return false;
    });
});