
<?php

verificaPermissaoPagina(2);

?>
<div class="box-content">
    <h2><i class=" fas fa-pencil-alt"></i>Editar Usuários</h2>
    <form method="POST" enctype="multipart/form-data">
    <?php
            if(isset($_POST['acao'])){
                //enviei o meu formulario
                $login = $_POST['login'];
                $nome = $_POST['nome'];
                $senha = $_POST['password'];
                $imagem = $_FILES['imagem'];
                $cargo = $_POST['cargo'];

                if($login == ''){
                    Painel::alert('erro','O login está vazio!');
                }else if($nome == ''){
                    Painel::alert('erro','O nome está vazio');
                }else if($senha == ''){
                    Painel::alert('erro','Você precisa cadastrar uma senha');
                }else if($cargo == ''){
                    Painel::alert('erro','O cargo precisa estar selecionado');
                }else if($imagem['name'] == ''){
                    Painel::alert('erro','É obrigatório carregar uma imagem');
                }else if(Usuario::userExists($login)){
                    Painel::alert('erro','O login já existe, selecione outro por favor!');
                }else{
                    //Podemos cadastrar
                    if($cargo >= $_SESSION['cargo']){
                        Painel::alert('erro','Você precisa selecionar um cargo menor que o seu!');
                    }else if(Painel::imagemValida($imagem) == false){
                        Painel::alert('erro','O formato especificado não está correto');

                    }else{
                        //Apenas cadastrasr no banco de dados 
                        $usuario = new Usuario();
                        $imagem = Painel::uploadFile($imagem);
                        $usuario->cadastrarUsuario($login,$senha,$imagem,$nome,$cargo);
                        Painel::alert('sucesso','O cadastro '.$login.' foi realizado com sucesso');
                    }
                }

                
                

                
            }
        ?>

        <div class="form-group">
            <label>login:</label>
            <input type="text" name="login"  value="<?php echo $_SESSION['nome'];?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome"  value="<?php echo $_SESSION['nome'];?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password"  value="<?php echo $_SESSION['password'];?>">
        </div><!--form-group-->

        <div class="form-group">
            <label>Cargo: </label>
            <select name="cargo" >
                <?php
                    foreach(Painel::$cargos as $key => $value) {
                     if($key < $_SESSION['cargo'])   echo '<option value="'.$key.'">'.$value.'</option>';
                    }
                ?>

            </select>
        </div><!--form-group-->

        <div class="form-group">
            <label>Imagem:</label>
            <input type="file" name="imagem"/>
        </div><!--form-group-->

        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form-group-->
    </form>
</div><!--Contentet-->