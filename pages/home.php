
<?php

    $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();

?>


<section class="banner-principal">
        <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../projeto_01_Estudo/images/banner1.jpg');" class="banner-single"></div><!--banner-single-->
        <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../projeto_01_Estudo/images/banner2.jpg');" class="banner-single"></div><!--banner-single-->
        <div style="background-image: url('<?php echo INCLUDE_PATH; ?>../projeto_01_Estudo/images/banner3.jpg');" class="banner-single"></div><!--banner-single-->

            <div class="overlay"></div><!--overlay-->
            <div class="center">
            <div class="bullets">
                
                
            </div><!--bullets-->
                
                <form class="ajax-form" method="POST" action="">
                    <h2>Quer receber um orçamento? </h2>
                    <p style="color: white; text-align:center; font-size:18px; font-weight:normal; padding-bottom:15px;">saiba como seu negócio pode faturar mais com a internet</p>
                    <input type="hidden" name="identificador" value="form_home"/>
                    <input type="text" name="name" placeholder="Qual seu nome?" /> 
                    <label>Qual seu telefone?</label>
                    <input type="tel" name="phone" required placeholder="(xx) xxxxx-xxxx" /> 
                    <input type="email" name="email" placeholder="Qual seu E-mail?"  >
                    
                    <input type="submit" name="acao" value="Enviar!">
                </form>

            </div>
        </section><!--banner-principal-->
        <section class="descricao-autor">
            <div class="center">
                <div class="w100 left">

                    <h2 class="text-center"><img  src="<?php echo INCLUDE_PATH; ?>images/logoMpr.png"> <?php echo $infoSite['nome_autor']; ?></h2>
                    <p><?php echo $infoSite['descricao'];?></p>
                    
                </div><!--w50-->

                <!---<div class="w50 left">

                    <img class="right" src="<?php echo INCLUDE_PATH; ?>images/logoMpr.png" alt="">
                </div><!--w50-->
                <div class="clear"></div><!--clear-->
            </div><!--center-->
        </section><!--descricao-autor-->
        <section class="especialidades">
            
            <div class="center">
                <h2 class="title">Especialidades</h2>
                <div class=" w33 left box-especialidade">
                    <h3><i class="<?php echo $infoSite['icone1'];?>"></i></h3>
                    <h4>Exposição</h4>
                    <p><?php echo $infoSite['descricao1'];?></p>
                </div><!--box-especialidade-->
                <div class="w33 left box-especialidade">
                    <h3><i class="<?php echo $infoSite['icone2'];?>"></i></h3>
                    <h4> Google</h4>
                    <p><?php echo $infoSite['descricao2'];?><p>
                </div><!--box-especialidade-->
                <div class="w33 left box-especialidade">
                    <h3><i class="<?php echo $infoSite['icone3'];?>"></i></h3>
                    <h4>Detalhes</h4>
                    <p><?php echo $infoSite['descricao3'];?></p>
                </div><!--box-especialidade-->
                <div class="clear"></div><!--Clear-->
            </div><!--center-->
        </section><!--especialidades-->

        <section class="extras">
            <div class="center">
              <div id="depoimentos" class="w50 left depoimentos-container">
                <h2 class="title">Depoimentos dos nossos clientes</h2>
                    <?php
                        $sql =  MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3 ");
                        $sql->execute();
                        $depoimentos = $sql->fetchAll();
                        foreach($depoimentos as $key => $value){
                    ?>

                    <div class="depoimentos-single">
                        <p class="depoimentos-descricao"> "<?php echo $value['depoimento']?>" </p>
                        <p class="nome-autor"> <?php echo $value['nome']?> -  <?php echo $value['data']?></p>
                    </div><!--depoimentos-single-->
                    <?php  } ?>
              </div><!--w50-->
              <div id="servicos" class="w50 left servicos-container">
                <div class="center">
                    <h2 class="title">Serviços</h2>
                    <div class="servicos">
                        <ul>
                        <?php
                        $sql =  MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC LIMIT 6 ");
                        $sql->execute();
                        $servicos = $sql->fetchAll();
                        foreach($servicos as $key => $value){
                        ?>
                            
                            <li><?php echo $value['servicos']?></li>
                            <?php } ?>
                           
                        </ul>
                    </div><!--servicos-->
                </div>
              </div><!--w50-->
                
              <div class="clear"></div><!--clear-->
            </div><!--center-->


        </section><!--extras-->