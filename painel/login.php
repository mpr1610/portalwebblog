<?php

    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
        $sql->execute(array($user,$password));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['img'] = $info['img'];
            header('Location:'.INCLUDE_PATH_PAINEL);
            die();
        }
    }


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH_PAINEL?>css/style.css" rel="stylesheet" />
    <title>Painel de Controle - Acesso administrativo</title>
</head>
<body>
    <div class="box-login">
        <?php
            if(isset($_GET['login'])){
                $user = $_POST['user'];
				$password = $_POST['password'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
				$sql->execute(array($user,$password));
                if($sql->rowCount() == 1){
                    $info = $sql->fetch();
                    //logamos com sucesso
                    $_SESSION['login'] = true;
					$_SESSION['user'] = $user;
					$_SESSION['password'] = $password;
                    $_SESSION['cargo'] = $info['cargo'];
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['img'] = $info['img'];
                    if(isset($_POST['lembrar'])){
						setcookie('lembrar',true,time()+(60*60*24),'/');
						setcookie('user',$user,time()+(60*60*24),'/');
						setcookie('password',$password,time()+(60*60*24),'/');
					}
                    header('Location:'.INCLUDE_PATH_PAINEL);
					die();
                }else{
                    //falhou
                    echo '<div  class="erro-box" style="background-color:red;"> <i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
                }
            }
        ?>
        <h2>Efetue o login</h2>
        <form method="POST" action="?login=true" enctype="multipart/form-data">
            <input type="text" name="user" placeholder="Login..." required>
            <input type="password" name="password" placeholder="senha" required>

            <div class="form-group-login left">
                <input type="submit" name='acao' value="Logar">
            </div>
            <div class="form-group-login right">
                <label> Lembrar-me</label>
                <input type="checkbox" name="lembrar" />
            </div>
            <div class="clear"></div>
        </form>
    </div>
    
</body>
</html>