<?php
	


	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	//ob_start();
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/vendor/autoload.php');
		}
		//require_once('classes/Email.php');
		require_once('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);



    define('INCLUDE_PATH','http://localhost/FULL%20STACK/CURSO%20DESENVOLVIMENTO%20WEB%20COMPLETO/PROJETOS/projeto_01_Estudo/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	//conectar com banco de dados
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','projeto_01');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');


	//Constantes para o painel de controle
	define('NOME_EMPRESA', 'MPR BIZ');


	

	//funções
	function pegaCargo($indice){
		return Painel::$cargos[$indice];
	}

	function selecionadoMenu($par){
		$url = explode('/',@$_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	

	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none";';
		
		}
	}

	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negada.php');
			die();
		
		}
	}


	function recoveryPost($post){
		if(isset($_POST[$post])){
			echo $_POST[$post];
				}

	}



?>