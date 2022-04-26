<?php 
include_once('valida_administrador.php');
valida_administrador();
?>

<link rel="shortcut icon" href="img/favicon.png">
<div class="tudo">
<div class="topo">
<?php include_once('header_adm.php'); ?>
</div>

<div class="conteudo">

    <?php
      if (!isset($_POST["salvar"]))
      {

    ?>

  <div class="container"> <!-- Inicio Container -->
      <div class="login">
        <form class="form-signin" name="form1" action="cad_categoria.php" method="post">
            <div class="form-group">
              <img src="img/categoria.png" class="img-rounded img-responsive" alt="Login">
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-12">
            Nome:<br>
            <input type="text" id="nome" class="form-control" name="nome" placeholder="Ex: Erro de Sistema" required autofocus><br>
            </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="salvar">Cadastrar</button><br>
            <a href='javascript:history.go(-1);'><button class="btn btn-lg btn-default btn-block" type="button" name="voltar">Voltar</button></a><br>
        </form>
      </div>
      <br>
  </div> <!-- Fim Container -->

  <?php
    }
    else
    {
            $nome = $_POST["nome"];

            include_once('conexao.php');
            include_once ('categoria.php');

            $icategoria= new categoria($nome);

             try{
  
            $ins=$pdo->prepare("insert into categoria(cat_nome) values(:nome)");
            $ins->bindValue(':nome',$icategoria->nome);
            $ins->execute();
              echo "          <div class='container theme-showcase' role='main'>
                                <div class='panel panel-default'> 
                                <div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
                                <div class='panel-body'> 
                                Categoria cadastrada com sucesso!<br><br>
                                <a href='home_adm.php'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
                                </div> 
                                </div>
                            </div>";
            } catch(PDOException $e) {
            echo 'Error: Problema ao inserir a Categoria.<br>' . $e->getMessage();

            }
             }

  ?>


</div>

<div class="rodape">
<?php include_once('footer.php'); ?>
</div>
           
</div>

