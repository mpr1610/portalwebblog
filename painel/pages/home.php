<?php
	$usuariosOnline = Painel::listarUsuariosOnline();

	$pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
	$pegarVisitasTotais->execute();

	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

	$pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
	$pegarVisitasHoje->execute(array(date('Y-m-d')));

	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();


?>
<div class="box-content w100">
            <h2><i class="fa fa-home"></i> Painel de controle - <?php echo NOME_EMPRESA?></h2>

            <div class="box-metricas">
                    <div class="box-metricas-single1">
                        <div class="box-metrica-wrapper1">
                            <h2>Usuarios online</h2>
                            <p> <?php echo count($usuariosOnline); ?></p>
                        </div><!--box-metrica-wrapper-->
                    </div><!--box-metricas-single-->

                    <div class="box-metricas-single2">
                        <div class="box-metrica-wrapper2">
                            <h2>Total de visita</h2>
                            <p> <?php echo $pegarVisitasTotais;?></p>
                        </div><!--box-metrica-wrapper-->
                    </div><!--box-metricas-single-->

                    <div class="box-metricas-single3">
                        <div class="box-metrica-wrapper">
                            <h2>Visitas hoje</h2>
                            <p><?php echo $pegarVisitasHoje;?></p>
                        </div><!--box-metrica-wrapper-->
                    </div><!--box-metricas-single-->


                <div class="clear"></div>
            </div><!--box-metricas-->

</div><!--box-content-->

<div class="box-content w100 left">
        <h2><i class="fa fa-rocket"> Usuarios Online do site</i></h2>
        <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <span>IP</span>
                </div><!--col-->
                <div class="col">
                    <span>Última ação</span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            <?php
               foreach($usuariosOnline as $key => $value){
            ?>
            <div class="row">
                <div class="col">
                    <span><?php echo $value['Ip'] ?></span>
                </div><!--col-->
                <div class="col">
                    <span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])); ?></span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            <?php } ?>
        </div><!--table-responsive-->
        <div class="clear"></div>
</div><!--box-content-->


<div class="box-content w100 right">
        <h2><i class="fa fa-rocket"> Usuarios do Painel</i></h2>
        <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <span>Nome</span>
                </div><!--col-->
                <div class="col">
                    <span>Cargo</span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            <?php
                $usuariosPainel = Mysql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
                $usuariosPainel->execute();
                $usuariosPainel = $usuariosPainel->fetchAll();
               foreach($usuariosPainel as $key => $value){
            ?>
            <div class="row">
                <div class="col">
                    <span><?php echo $value['user'] ?></span>
                </div><!--col-->
                <div class="col">
                    <span><?php echo pegaCargo($value['cargo']); ?></span>
                </div><!--col-->
                <div class="clear"></div>
            </div><!--row-->
            <?php } ?>
        </div><!--table-responsive-->
</div><!--box-content-->
<div class="clear"></div>