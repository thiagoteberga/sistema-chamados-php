<?php 
include_once('valida_usuario.php');
valida_usuario();
include_once('conexao.php');
?>

        <?php
            include_once ('chamado.php');

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

<link rel="shortcut icon" href="img/favicon.png">
<div class="tudo"> <!-- /tudo -->

<div class="topo">
<?php include_once('header_usu.php'); ?>
</div>

<div class="conteudo"> <!-- /conteudo -->

<style>
select[readonly] {
  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
  pointer-events: none;
  touch-action: none;
}
</style>

    <div class="container">
      <div class="login">
        <form class="form-signin" name="form1" action="res_chamado_usu_f.php" method="post">
            <div class="form-group">
              <img src="img/chamado.png" class="img-rounded img-responsive" alt="Login">
            </div>

            <input type="hidden" id="id" class="form-control" name="id" value = <?php echo ("'$id'"); ?> readonly="true"><br>
            <div class="row">
            <div class="col-xs-6 col-md-4">
            Assunto:<br>
            <input type="text" id="assunto" class="form-control" name="assunto" value = <?php echo ("'$assunto'"); ?> placeholder="Ex: Lentidão no Sistema" required autofocus readonly="true"><br>
            </div>
            <div class="col-xs-6 col-md-4">
            Categoria:<br>
              <select class="form-control" name="categoria" readonly="true">
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
            <select class="form-control" name="status" readonly="true">
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
            <select class="form-control" name="responsavel" readonly="true">
                <?php
                include_once ('usuario.php');
                $busca=$pdo->prepare("SELECT USU_LOGIN, USU_NOME FROM USUARIO");
                $busca->execute();

                //Seta a Linha como Objeto
                while ($obj=$busca->fetch(PDO::FETCH_OBJ)){
                  $idusu = $obj->USU_LOGIN;
                  $nome = $obj->USU_NOME;
                    if ($idusu == $responsavel) {
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
            <textarea class="form-control" rows="10" id="historico" name="historico" required readonly="true"><?php echo ("$descricao"); ?></textarea>
            <br>
            </div>
            </div>
            <a href='javascript:history.go(-1);'><button class="btn btn-lg btn-primary btn-block" type="button" name="voltar">Voltar</button></a><br>
        </form>
      </div>
    </div> <!-- /container -->

</div> <!-- /conteudo -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <div class="rodape">
    <?php include_once('footer.php'); ?>
    </div>

</div> <!-- /tudo -->