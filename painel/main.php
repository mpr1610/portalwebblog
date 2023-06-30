<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
    }


?>
<!DOCTYPE html>
<html lang="en">
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
    

    <div class="menu">
        <div class="menu-wraper">
            <div class="box-usuario">
                <?php
                    if($_SESSION['img'] == ''){
                ?>
                    <div class="avatar-usuario">
                            <i class="fa fa-user"></i>
                    </div><!--avatar-usuario-->
                <?php }else{ ?>
                    <div class="imagem-usuario">
                            <img src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $_SESSION['img'];?>">
                    </div><!--avatar-usuario-->
                <?php } ?>
                    <div class="nome-usuario">
                        <p><?php echo $_SESSION['nome'];?></p>
                        <p><?php echo pegaCargo($_SESSION['cargo']);?></p>
                    </div><!--nome-usuario-->
                    </div><!--box-usuario-->
                    <div class="itens-menu">
                    <h2>Cadastro</h2>
                        <a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
                        <a <?php selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servico">Cadastrar Serviço</a>
                        <a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>
                        <h2>Gestão</h2>
                        <a <?php selecionadoMenu('listar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimentos</a>
                        <a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviços</a>
                        <a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
                        <h2>Administração do painel</h2>
                        <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
                        <a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
                        <h2>Configuração Geral</h2>
                        <a <?php selecionadoMenu('editar-site'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site">Editar Site</a>
                        <h2>Gestão de Noticias</h2>
                        <a <?php selecionadoMenu('cadastrar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-categorias">Cadastrar Categorias</a>
                        <a <?php selecionadoMenu('gerenciar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias">Gerenciar Categorias</a>
                        <a <?php selecionadoMenu('cadastrar-noticias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-noticia">Cadastrar Noticias</a>
                        <a <?php selecionadoMenu('gerenciar-noticia'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias">Gerenciar Noticias</a>

                    </div><!--itens-menu-->

        </div><!--menu-wraper-->

    </div><!--menu-->
    
    <header>
        <div class="center">
            <div class="menu-btn">
                <i class="fa fa-bars"></i>
            </div><!--menu-btn-->

            
        <div class="loggout">
			<a <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
		</div><!--loggout-->

        <div class="clear"></div>
        </div><!--center-->
        
    </header>
    <div class="content">

            <?php Painel::carregarPagina();?>


        </div><!--content-->

      

        <div class="clear"></div>
    </div><!--content-->
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>  
    <script src="<?php echo INCLUDE_PATH_PAINEL?>js/main.js"></script>
    <script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/jquery.mask.js"></script>  
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
  	selector:'.tinymce',
  	plugins: "image",
  	height:300
   });
  </script>
</body>
</html>

