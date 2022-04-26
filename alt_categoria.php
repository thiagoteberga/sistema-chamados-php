<?php 
include_once('valida_administrador.php');
valida_administrador();
include_once('conexao.php');
include_once ('categoria.php');
?>

<link rel="shortcut icon" href="img/favicon.png">
<div class="tudo">

<div class="topo">
<?php include_once('header_adm.php'); ?>
</div>

<div class="conteudo">

        <?php

            if(!isset($_POST["salvar"]))
            {

                $id= $_POST["alterar"];


                $busca=$pdo->prepare("SELECT CAT_ID, CAT_NOME FROM CATEGORIA WHERE CAT_ID = :ID");
                $busca->bindValue(":ID",$id);
                $busca->execute();

                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                    $id = $obj->CAT_ID;
                    $nome = $obj->CAT_NOME;
                }

        ?>

  <div class="container"> <!-- Inicio Container -->
      <div class="login">
        <form class="form-signin" name="form1" action="alt_categoria.php" method="post">
            <div class="form-group">
              <img src="img/categoria.png" class="img-rounded img-responsive" alt="Login">
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-3">
            ID:<br>
            <input type="text" id="id" class="form-control" name="id" placeholder="Ex: Erro de Sistema" required autofocus value = <?php echo ("'$id'"); ?> readonly="true"><br>
            </div>
            <div class="col-xs-6 col-md-9">
            Nome:<br>
            <input type="text" id="nome" class="form-control" name="nome" placeholder="Ex: Erro de Sistema" required autofocus value = <?php echo ("'$nome'"); ?>><br>
            </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="salvar">Alterar</button><br>
            <a href='javascript:history.go(-1);'><button class="btn btn-lg btn-default btn-block" type="button" name="voltar">Voltar</button></a><br>
        </form>
      </div>
      <br>
  </div> <!-- Fim Container -->

  <?php
    }
    else
    {
            $id = $_POST['id'];
            $nome = $_POST['nome'];

                $busca=$pdo->prepare("UPDATE CATEGORIA SET CAT_NOME = :nome WHERE CAT_ID =:id");
                $busca->bindValue(":nome",$nome);
                $busca->bindValue(":id",$id);
                $busca->execute();

              echo "          <div class='container theme-showcase' role='main'>
                                <div class='panel panel-default'> 
                                <div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
                                <div class='panel-body'> 
                                Registro alterado com sucesso!<br><br>
                                <a href='ger_categoria.php'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
                                </div> 
                                </div>
                            </div>";
               }

  ?>


</div>

<div class="rodape">
<?php include_once('footer.php'); ?>
</div>
           
</div>

