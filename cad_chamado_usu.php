<?php 
include_once('valida_usuario.php');
valida_usuario();
include_once('conexao.php');
?>

<link rel="shortcut icon" href="img/favicon.png">
<div class="tudo"> <!-- /tudo -->

<div class="topo">
<?php include_once('header_usu.php'); ?>
</div>

<div class="conteudo"> <!-- /conteudo -->

    <?php
      if (!isset($_POST["salvar"]))
      {

    ?>

    <div class="container">

<style>
select[readonly] {
  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
  pointer-events: none;
  touch-action: none;
}
</style>

      <div class="login">
        <form class="form-signin" name="form1" action="cad_chamado_usu.php" method="post">
            <div class="form-group">
              <img src="img/chamado.png" class="img-rounded img-responsive" alt="Login">
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-6">
            Assunto:<br>
            <input type="text" id="assunto" class="form-control" name="assunto" placeholder="Ex: Lentidão no Sistema" required autofocus><br>
            </div>
            <div class="col-xs-6 col-md-6">
            Categoria:<br>
              <select class="form-control" name="categoria">
                <?php
                include_once ('categoria.php');
                $busca=$pdo->prepare("SELECT CAT_ID, CAT_NOME FROM CATEGORIA");
                $busca->execute();

                //Seta a Linha como Objeto
                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                  $id = $obj->CAT_ID;
                  $nome = $obj->CAT_NOME;
                   echo("<option value='$id'>$nome</option>");
                }
                ?>
              </select><br>
            </div>
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-3">
            Solicitante:<br>
            <select class="form-control" name="solicitante" readonly="true">
                <?php
                include_once ('categoria.php');
                $busca=$pdo->prepare("SELECT USU_LOGIN, USU_NOME FROM USUARIO");
                $busca->execute();

                //Seta a Linha como Objeto
                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                  $id = $obj->USU_LOGIN;
                  $nome = $obj->USU_NOME;
                  if ($id == $_SESSION["login"]) {                    
                    echo("<option selected value='$id'>$nome</option>");
                    }
                    else
                    {
                    echo("<option value='$id'>$nome</option>");
                    }
                }
                ?>
            </select><br>
            </div>
            <div class="col-xs-6 col-md-3">
            Responsável:<br>
            <input type="text" id="responsavel" class="form-control" name="responsavel" value = "T.I." placeholder="Ex: Stan Lee" readonly="true"><br>
            </div>
            <div class="col-xs-6 col-md-3">
            Data de Abertura:<br>
            <input type="text" id="dtabertura" class="form-control" name="dtabertura" value = "<?php echo date('d/m/Y'); ?>" readonly="true"><br>
            </div>
            <div class="col-xs-6 col-md-3">
            Status:<br>
            <input type="text" id="status" class="form-control" name="status" value = "Aberto" readonly="true"><br>
            </div>
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-12">
            Descrição:<br>
            <textarea class="form-control" rows="5" id="descricao" name="descricao" placeholder="Ex: Problemas referente a queda de energia." required></textarea>
            <br>
            </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="salvar">Abrir Chamado</button><br>
            <a href='javascript:history.go(-1);'><button class="btn btn-lg btn-default btn-block" type="button" name="voltar">Voltar</button></a><br>
        </form>
      </div>
    </div> <!-- /container -->


<?php
    }
    else
    {
            $assunto = $_POST['assunto'];
            $categoria = $_POST['categoria'];
            $solicitante = $_POST['solicitante'];
            $responsavel = $_POST['responsavel'];
            $dtabertura = $_POST['dtabertura'];
            $status = '1';
            $dtsolucao = '';
            $descricao = $_POST['descricao'];

            $busca=$pdo->prepare("SELECT USU_LOGIN, USU_NOME FROM USUARIO WHERE USU_LOGIN = '$solicitante'");
            $busca->execute();

            //Seta a Linha como Objeto
            while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                $idu = $obj->USU_LOGIN;
                $nomeu = $obj->USU_NOME;
                $descricao = ("\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \n"."Enviado por: "."$nomeu"." em ".date('d/m/Y')."\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \n"."$descricao");
            }
            
      include_once ('chamado.php');

            $ichamado = new chamado($categoria, $assunto, $descricao, $status, $solicitante, $responsavel, $dtabertura, $dtsolucao);

             try{
  
            $ins=$pdo->prepare("insert into chamado(cat_id,cha_assunto,cha_descricao,cha_status,cha_solicitante,cha_responsavel,cha_dt_abertura,cha_dt_solucao)values(:categoria,:assunto,:descricao,:status,:solicitante,:responsavel,NOW(),:dtsolucao)");
            $ins->bindValue(':categoria',$ichamado->categoria);
            $ins->bindValue(':assunto',$ichamado->assunto);
            $ins->bindValue(':descricao',$ichamado->descricao);
            $ins->bindValue(':status',$ichamado->status);
            $ins->bindValue(':solicitante',$ichamado->solicitante);
            $ins->bindValue(':responsavel',$ichamado->responsavel);
            $ins->bindValue(':dtsolucao',$ichamado->dtsolucao);
            $ins->execute();
            echo "          <div class='container theme-showcase' role='main'>
                                <div class='panel panel-default'> 
                                <div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
                                <div class='panel-body'> 
                                Chamado aberto com sucesso!<br><br>
                                <a href='home_usu.php'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
                                </div> 
                                </div>
                            </div>";

            } catch(PDOException $e) {
            echo 'Error: Problema ao inserir o Chamado.<br>' . $e->getMessage();

            }
             }

  ?>


</div> <!-- /conteudo -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <div class="rodape">
    <?php include_once('footer.php'); ?>
    </div>

</div> <!-- /tudo -->