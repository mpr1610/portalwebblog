<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php

    $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $infoSite['titulo'];?></title>
        <meta name="keywords" content="Conheça a MPR BIZ, Agência de Marketing Digital, Agência de Marketing, Marketing digital,]
        Agência de MKT,  Agência de MKT digital, como criar um site?, gestão de redes sociais, marketing digital empresas, marketing digital para empresas, empresas que prestam serviços de marketing digital">
        <meta name="description" content="A Agência que ajuda o seu negócio a faturar mais com a Internet">
        <link rel="icon" href="<?php echo INCLUDE_PATH; ?>images/ico.ico" type="image/x-ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
       
    </head>
    <body>

    <base base="<?php echo INCLUDE_PATH; ?>" />

        <?php
            $url = isset($_GET['url']) ? $_GET['url'] : 'home';
            switch($url){
                case 'depoimentos';
                echo '<target target="depoimentos" />';
                break;
                case 'servicos';
                echo '<target target="servicos" />';
                break;
            }
        
        ?>
        <div class="sucesso">✔️ Formulário enviado com sucesso</div>
        <div class="erro">❌​ Não foi possivel enviar o Formulário</div>
        <div class="overlay-loading">
            <img src="<?php echo INCLUDE_PATH?>images/loading.gif"/>


        </div><!--overlay-loading-->

        <header>
            <div class="center">
                <div class="logo left"></div><!--logo-->
                <nav class="desktop right">
                    <ul>
                        <li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>blog">Blog</a></li>
                        <li><a  href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                    </ul>
                </nav><!--desktop-->
                <nav class="mobile right">
                    <div class="botao-menu-mobile">
                         <i class="fas fa-bars"></i>
                    </div><!--mobile-->
                    <ul>
                            
                        <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                        <li><a href="<?php echo INCLUDE_PATH; ?>blog">Blog</a></li>
                        <li><a  href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                    </ul>
                 </nav><!--mobile-->
                 <div class="clear"></div><!--clear-->
            </div>
        </header>
         <?php

           if(file_exists('pages/'.$url.'.php')){
               include('pages/'.$url.'.php');
           }else{

               if($url != 'depoimentos' && $url != 'servicos'){
                $urlPar = explode('/',$url)[0];
                if($urlPar != 'blog'){
                $pagina404 = true;
                include('pages/404.php');
              }else{
                include('pages/blog.php');
              }
            }else{
                  include('pages/home.php');
              }
            }
        
         ?> 

          
          
        <footer>
            <div class="center">
                <p>MPR BIZ - Michael Patrick - Todos os direitos reservados</p>
            </div>
        </footer>
        
        <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>js/constant.js"></script>
        <script src="js/especialidades.js"></script>
        <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>

        <?php
        
        if(is_array($url) && strstr($url[0],'blog') !== false){
        ?>
        <script>
           $(function(){
            $('select').change(function(){
                location.href=include_path+"blog/"+$(this).val();
            })
           })
        </script>
        <?php
            }
        ?>



        <?php
		if($url == 'contato'){
	    ?>
	    <?php } ?>
	    <!--<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>-->
	    <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
        
        
       
    
        <script></script>
    </body>
</html>