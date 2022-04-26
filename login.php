<?php

$login = $_POST['login'];
$senha = $_POST['senha'];
$enviar = $_POST['enviar'];
$nome = '';
$acesso = '';

if (isset($_POST["enviar"])){
							include_once 'conexao.php';
							include_once 'usuario.php';

           					$iusuario= new usuario($login, $senha, $nome, $acesso);
            				echo"<br>";

             try{

							$select=$pdo->prepare("SELECT USU_LOGIN, USU_SENHA, USU_NOME, USU_ACESSO FROM usuario WHERE USU_LOGIN = :login AND USU_SENHA = :senha");
							$select->bindValue(':login',$iusuario->login);
            				$select->bindValue(':senha',$iusuario->senha);
							$select->execute();
							$cont = $select->rowCount();

							if($cont>=1){

								while ($obj=$select->fetch(PDO::FETCH_OBJ)){
								
									$tipo = $obj->USU_ACESSO;
									$nome = $obj->USU_NOME;
									$primeironome=$nome;
									$primeironome=explode(" ", $primeironome);
									$nome = $primeironome[0];

									if($tipo=='1') {
										session_start();
										$_SESSION["login"]=$login;
										$_SESSION["senha"]=$senha;
										$_SESSION["tipo"]=$tipo;
										$_SESSION["nome"]=$nome;
										header('Location:home_adm.php');
									}else{
										session_start();
										$_SESSION["login"]=$login;
										$_SESSION["senha"]=$senha;
										$_SESSION["tipo"]=$tipo;
										$_SESSION["nome"]=$nome;
										header('Location:home_usu.php');
									}
									}


							}
							else
							{

		echo <<<HTML

		<html lang='pt-br'>

		<head>
			<meta charset='utf-8'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<meta name='description' content=''>
			<meta name='author' content=''>

			<link rel='shortcut icon' href='img/favicon.png'>

			<title>Login - Chamados</title>

			<!-- Bootstrap core CSS -->
			<link href='css/bootstrap.min.css' rel='stylesheet'>
			<!-- Bootstrap theme -->
			<link href='css/bootstrap-theme.min.css' rel='stylesheet'>
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<link href='css/ie10-viewport-bug-workaround.css' rel='stylesheet'>

			<!-- Custom styles for this template -->
			<link href='css/dashboard.css' rel='stylesheet'>

			<link href='css/style.css' rel='stylesheet'>    

			<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
			<!--[if lt IE 9]><script src='js/ie8-responsive-file-warning.js'></script><![endif]-->
			<script language='JavaScript' type='text/javascript' src='js/ie-emulation-modes-warning.js'></script>

			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
		<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>          
		<![endif]-->

		<script language='JavaScript' type='text/javascript' src='js/cidades-estados-utf8.js'></script>

	</head>

	<body>


		<div class="container theme-showcase" role="main">
			<div class='panel panel-default'> 
					<div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
					<div class='panel-body' align='center'> <p align='center'>Login e/ou senha incorretos.</p><br><br><a href='javascript:history.go(-1);'><button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
					</div> 
			</div>
		</div>


    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>`


	</body>

	</html>
HTML;
							}
            	} 
            	catch(PDOException $e) {
            	echo 'Error: Problema ao logar no sistema.<br>' . $e->getMessage();

            	}
}	else {
	echo $_POST["enviar"];
}	
?>