<!DOCTYPE html>
 <html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sistema de Chamados</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>


<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'/>  
<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
   
<script>
  $(function () {
    $('.dropdown-toggle').dropdown();
  }); 
</script>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/customizado.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

    <body>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div>
          
          <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-left">

              <li><a href="home_usu.php"><span class='glyphicon glyphicon-home' aria-hidden='true'></span> Página Inicial </a></li> 
              
              <li><a href="cad_chamado_usu.php"><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Novo Chamado</a></li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class='glyphicon glyphicon-search' aria-hidden='true'></span> Meus Chamados<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="ger_chamado_usu_a.php">Chamados Abertos</a></li>
                  <li><a href="ger_chamado_usu_f.php">Chamados Fechados</a></li>
                </ul>
              </li>

            </ul>



            <ul class="nav navbar-nav navbar-right">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>  Olá, <?php echo $_SESSION["nome"]; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="index.php"><span class='glyphicon glyphicon-off' aria-hidden='true'></span> Sair</a></li>
                </ul>
              </li>
            </ul>


          </div>
        </div>
      </nav>