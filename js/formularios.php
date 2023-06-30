<?php   
    include('../config.php');
        $data = array();
        $assunto = 'Nova Mensagem do site';
        $corpo = '';
        foreach($_POST as $key => $value){
            $corpo.=ucfirst($key)." : ".$value;
            $corpo.="<hr>"; 
        }
        $info = array('assunto'=>$assunto, 'corpo'=>$corpo);
        $mail = new Email('p3plzcpnl479485.prod.phx3.secureserver.net','site@agenciamprbiz.com.br','Michael123@p','MPR BIZ');
        $mail->addAddress('contato@mprbiz.com.br','MPR BIZ');
        $mail->addAddress('site@agenciamprbiz.com.br','MPR BIZ');
        $mail->formatarEmail($info);
       // if($mail->enviarEmail()){
      //  $data['sucesso'] = true;
      //  }else{
      //    $data['erro'] = true;
      //  }
        $data['retorno'] = 'sucesso';
        die(json_encode($data));
?>


                                
                            

  



