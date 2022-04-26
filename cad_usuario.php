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
        <form class="form-signin" name="form1" action="cad_usuario.php" method="post">
            <div class="form-group">
              <img src="img/cadastro.png" class="img-rounded img-responsive" alt="Login">
            </div>
            <div class="row">
            <div class="col-xs-6 col-md-9">
            Nome:<br>
            <input type="text" id="nome" class="form-control" name="nome" placeholder="Ex: Thiago Teberga" required autofocus><br>
            </div>
            <div class="col-xs-6 col-md-3">
            Tipo:<br>
              <select class="form-control" name="acesso">
                <option value="2">Usuário</option>
                <option value="1">Administrador</option>
              </select>
            </div>
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-6">
            Usuário:<br>
            <input type="text" id="login" class="form-control" name="login" placeholder="Ex: tteberga" required><br>
            </div>
            <div class="col-xs-6 col-md-6">
            Senha:<br>
            <input type="password" id="senha" class="form-control" name="senha" placeholder="Ex: 19031994" required><br>
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
            $login = $_POST["login"];
            $senha = $_POST["senha"];
            $nome = $_POST["nome"];
            $acesso = $_POST["acesso"];

            include_once('conexao.php');
            include_once ('usuario.php');

            $iusuario= new usuario($login, $senha, $nome, $acesso);

             try{
  
            $ins=$pdo->prepare("insert into usuario(usu_login,usu_senha,usu_nome,usu_acesso) values(:login,:senha,:nome,:acesso)");
            $ins->bindValue(':login',$iusuario->login);
            $ins->bindValue(':senha',$iusuario->senha);
            $ins->bindValue(':nome',$iusuario->nome);
            $ins->bindValue(':acesso',$iusuario->acesso);
            $ins->execute();
            echo "          <div class='container theme-showcase' role='main'>
                                <div class='panel panel-default'> 
                                <div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
                                <div class='panel-body'> 
                                Usuário cadastrado com sucesso!<br><br>
                                <a href='home_adm.php'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
                                </div> 
                                </div>
                            </div>";
            } catch(PDOException $e) {
            echo 'Error: Problema ao inserir o Usuário.<br>' . $e->getMessage();

            }
             }

  ?>


</div>

<div class="rodape">
<?php include_once('footer.php'); ?>
</div>
           
</div>