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


                $busca=$pdo->prepare("SELECT USU_LOGIN, USU_SENHA, USU_NOME, USU_ACESSO FROM USUARIO WHERE USU_LOGIN = :ID");
                $busca->bindValue(":ID",$id);
                $busca->execute();

                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                    $id = $obj->USU_LOGIN;
                    $senha = $obj->USU_SENHA;
                    $nome = $obj->USU_NOME;
                    $acesso = $obj->USU_ACESSO;
                }

        ?>

  <div class="container"> <!-- Inicio Container -->
      <div class="login">
        <form class="form-signin" name="form1" action="alt_usuario.php" method="post">
            <div class="form-group">
              <img src="img/cadastro.png" class="img-rounded img-responsive" alt="Login">
            </div>
            <div class="row">
            <div class="col-xs-6 col-md-9">
            Nome:<br>
            <input type="text" id="nome" class="form-control" name="nome" placeholder="Ex: Thiago Teberga" required autofocus value = <?php echo ("'$nome'"); ?>><br>
            </div>
            <div class="col-xs-6 col-md-3">
            Tipo:<br>
              <select class="form-control" name="acesso">
                <?php
                if($acesso == '1'){
                echo("<option value='2'>Usuário</option>
                <option selected value='1'>Administrador</option>");
                }else{
                echo("<option selected value='2'>Usuário</option>
                <option value='1'>Administrador</option>");
                }
                ?>
              </select>
            </div>
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-6">
            Usuário:<br>
            <input type="text" id="login" class="form-control" name="login" placeholder="Ex: tteberga" required value = <?php echo ("'$id'"); ?> readonly="true"><br>
            </div>
            <div class="col-xs-6 col-md-6">
            Senha:<br>
            <input type="password" id="senha" class="form-control" name="senha" placeholder="Ex: 19031994" required value = <?php echo ("'$senha'"); ?>><br>
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
            $id = $_POST['login'];
            $nome = $_POST['nome'];
            $acesso = $_POST['acesso'];
            $senha = $_POST['senha'];

                $busca=$pdo->prepare("UPDATE USUARIO SET USU_SENHA = :senha, USU_NOME = :nome, USU_ACESSO = :acesso WHERE USU_LOGIN =:id");
                $busca->bindValue(":senha",$senha);
                $busca->bindValue(":acesso",$acesso);
                $busca->bindValue(":nome",$nome);
                $busca->bindValue(":id",$id);
                $busca->execute();

              echo "          <div class='container theme-showcase' role='main'>
                                <div class='panel panel-default'> 
                                <div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
                                <div class='panel-body'> 
                                Registro alterado com sucesso!<br><br>
                                <a href='ger_usuario.php'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
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