<?php 
include_once('valida_administrador.php');
valida_administrador();
include_once('conexao.php');
?>

<link rel="shortcut icon" href="img/favicon.png">
<div class="tudo"> <!-- /tudo -->

<div class="topo">
<?php include_once('header_adm.php'); ?>
</div>

<div class="conteudo"> <!-- /conteudo -->

<style>
select[readonly] {
  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
  pointer-events: none;
  touch-action: none;
}
</style>

        <?php
            include_once ('chamado.php');

            if(!isset($_POST["salvar"]))
            {

                $id= $_POST["alterar"];


                $busca=$pdo->prepare("SELECT A.CHA_ID, A. CAT_ID, A.CHA_ASSUNTO, A.CHA_DESCRICAO, A.CHA_STATUS, A.CHA_SOLICITANTE, A.CHA_RESPONSAVEL, A.CHA_DT_ABERTURA, A.CHA_DT_SOLUCAO, B.CAT_NOME
                      FROM CHAMADO A, CATEGORIA B
                      WHERE A.CAT_ID = B.CAT_ID AND A.CHA_ID = :ID
                      ORDER BY 1");
                $busca->bindValue(":ID",$id);
                $busca->execute();

                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                    $id = $obj->CHA_ID;
                    $catid = $obj->CAT_ID;
                    $assunto = $obj->CHA_ASSUNTO;
                    $descricao  = $obj->CHA_DESCRICAO;
                    $solicitante = $obj->CHA_SOLICITANTE;
                    $responsavel = $obj->CHA_RESPONSAVEL;
                    $dtabertura  = $obj->CHA_DT_ABERTURA;
                    $dtsolucao = $obj->CHA_DT_SOLUCAO;
                    $dscategoria = $obj->CAT_NOME;
                    $status = $obj->CHA_STATUS;
                }

        ?>


    <div class="container">
      <div class="login">
        <form class="form-signin" name="form1" action="res_chamado_adm.php" method="post">
            <div class="form-group">
              <img src="img/chamado.png" class="img-rounded img-responsive" alt="Login">
            </div>

            <input type="hidden" id="id" class="form-control" name="id" value = <?php echo ("'$id'"); ?> readonly="true"><br>
            <div class="row">
            <div class="col-xs-6 col-md-4">
            Assunto:<br>
            <input type="text" id="assunto" class="form-control" name="assunto" value = <?php echo ("'$assunto'"); ?> placeholder="Ex: Lentidão no Sistema" required autofocus><br>
            </div>
            <div class="col-xs-6 col-md-4">
            Categoria:<br>
              <select class="form-control" name="categoria">
                <?php
                include_once ('categoria.php');
                $busca=$pdo->prepare("SELECT CAT_ID, CAT_NOME FROM CATEGORIA");
                $busca->execute();

                //Seta a Linha como Objeto
                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                  $idcat = $obj->CAT_ID;
                  $nome = $obj->CAT_NOME;
                    if ($idcat == $catid) {                    
                    echo("<option selected value='$idcat'>$nome</option>");
                    }
                    else
                    {
                    echo("<option value='$idcat'>$nome</option>");
                    }
                }
                ?>
              </select><br>
            </div>
            <div class="col-xs-6 col-md-4">
            Status:<br>
            <select class="form-control" name="status">
                <?php
                include_once ('usuario.php');
                $busca=$pdo->prepare("SELECT STA_ID, STA_NOME FROM STATUS");
                $busca->execute();

                //Seta a Linha como Objeto
                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                  $idsta = $obj->STA_ID;
                  $nome = $obj->STA_NOME;
                    if ($idsta == $status) {                    
                    echo("<option selected value='$idsta'>$nome</option>");
                    }
                    else
                    {
                    echo("<option value='$idsta'>$nome</option>");
                    }
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
                include_once ('usuario.php');
                $busca=$pdo->prepare("SELECT USU_LOGIN, USU_NOME FROM USUARIO");
                $busca->execute();

                //Seta a Linha como Objeto
                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                  $idusu = $obj->USU_LOGIN;
                  $nome = $obj->USU_NOME;
                    if ($idusu == $solicitante) {                    
                    echo("<option selected value='$idusu'>$nome</option>");
                    }
                    else
                    {
                    echo("<option value='$idusu'>$nome</option>");
                    }
                    }
                ?>
            </select><br>
            </div>
            <div class="col-xs-6 col-md-3">
            Responsável:<br>
            <select class="form-control" name="responsavel">
                <?php
                include_once ('usuario.php');
                $busca=$pdo->prepare("SELECT USU_LOGIN, USU_NOME FROM USUARIO");
                $busca->execute();

                //Seta a Linha como Objeto
                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                  $idusu = $obj->USU_LOGIN;
                  $nome = $obj->USU_NOME;
                    if ($idusu == $_SESSION["login"]) {                    
                    echo("<option selected value='$idusu'>$nome</option>");
                    }
                    else
                    {
                    echo("<option value='$idusu'>$nome</option>");
                    }
                    }
                ?>
            </select><br>
            </div>
            <div class="col-xs-6 col-md-3">
            Data de Abertura:<br>
            <input type="text" id="dtabertura" class="form-control" name="dtabertura" value = <?php echo ("'$dtabertura'"); ?> readonly="true"><br>
            </div>
            <div class="col-xs-6 col-md-3">
            Data de Encerramento:<br>
            <input type="text" id="dtsolucao" class="form-control" name="dtsolucao" value = <?php echo ("'$dtsolucao'"); ?> readonly="true"><br>
            </div>
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-12">
            Histórico do Chamado:<br>
            <textarea class="form-control" rows="5" id="historico" name="historico" required readonly="true"><?php echo ("$descricao"); ?></textarea>
            <br>
            </div>
            </div>

            <div class="row">
            <div class="col-xs-6 col-md-12">
            Resposta:<br>
            <textarea class="form-control" rows="5" id="resposta" name="resposta" required></textarea>
            <br>
            </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="salvar">Responder Chamado</button><br>
            <a href='javascript:history.go(-1);'><button class="btn btn-lg btn-default btn-block" type="button" name="voltar">Voltar</button></a><br>
        </form>
      </div>
    </div> <!-- /container -->


<?php
    }
    else
    {
            $id = $_POST['id'];
            $assunto = $_POST['assunto'];
            $categoria = $_POST['categoria'];
            $solicitante = $_POST['solicitante'];
            $responsavel = $_POST['responsavel'];
            $dtabertura = $_POST['dtabertura'];
            $status = $_POST['status'];
            $historico = $_POST['historico'];
            $resposta = $_POST['resposta'];
            $login = $_SESSION['login'];

            if($status == 0){
                $dtsolucao = date('Y/m/d');
            }else{
                $dtsolucao = '';
            }

            $busca=$pdo->prepare("SELECT USU_LOGIN, USU_NOME FROM USUARIO WHERE USU_LOGIN = '$login'");
            $busca->execute();

            //Seta a Linha como Objeto
            while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                $idu = $obj->USU_LOGIN;
                $nomeu = $obj->USU_NOME;
                $descricao = ("\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \n"."Enviado por: "."$nomeu"." em ".date('d/m/Y')."\n - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - \n"."$resposta"."\n\n"."$historico");
            }

            include_once ('chamado.php');


                $busca=$pdo->prepare("UPDATE chamado SET cat_id = :categoria, cha_assunto = :assunto, cha_descricao = :descricao, cha_status = :status, cha_solicitante = :solicitante, cha_responsavel = :responsavel, cha_dt_abertura = :dtabertura, cha_dt_solucao = :dtsolucao WHERE cha_id =:id");
                $busca->bindValue(":categoria",$categoria);
                $busca->bindValue(":assunto",$assunto);
                $busca->bindValue(":descricao",$descricao);
                $busca->bindValue(":status",$status);
                $busca->bindValue(":solicitante",$solicitante);
                $busca->bindValue(":responsavel",$responsavel);
                $busca->bindValue(":dtabertura",$dtabertura);
                $busca->bindValue(":dtsolucao",$dtsolucao);
                $busca->bindValue(":id",$id);
                $busca->execute();

              echo "          <div class='container theme-showcase' role='main'>
                                <div class='panel panel-default'> 
                                <div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
                                <div class='panel-body'> 
                                Chamado respondido com sucesso!<br><br>
                                <a href='home_adm.php'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
                                </div> 
                                </div>
                            </div>";
               }

  ?>


</div> <!-- /conteudo -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <div class="rodape">
    <?php include_once('footer.php'); ?>
    </div>

</div> <!-- /tudo -->

