<?php 
include_once('valida_administrador.php');
valida_administrador();
?>

<link rel="shortcut icon" href="img/favicon.png">
<div class="tudo">
<div class="topo">
<?php include_once('header_adm.php'); ?>
</div>

<div class="conteudo"> <!-- /conteudo -->

<div class="container theme-showcase" role="main">
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Para alterar um chamado, clique no botão responder:</h3>
    </div>
    <div class="panel-body">
    
<div class="table-responsive">  
<table class="table table-hover" id="datatable">
  <thead>
    <tr>
      <th>Código</th>
      <th>Categoria</th>
      <th>Assunto</th>
      <th>Solicitante</th>
      <th>Responsavel</th>
      <th>Status</th>
      <th>Data Abertura</th>
      <th>Data Solução</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

    <?php 

      include_once('conexao.php');
      include_once ('chamado.php');
      $usuario = $_SESSION["login"];

$busca=$pdo->prepare("SELECT A.CHA_ID, A. CAT_ID, A.CHA_ASSUNTO, A.CHA_DESCRICAO, A.CHA_STATUS, A.CHA_SOLICITANTE, A.CHA_RESPONSAVEL, A.CHA_DT_ABERTURA, A.CHA_DT_SOLUCAO, B.CAT_NOME, C.STA_NOME
                      FROM CHAMADO A, CATEGORIA B,  STATUS C
                      WHERE A.CAT_ID = B.CAT_ID AND A.CHA_STATUS = C.STA_ID AND A.CHA_STATUS = 0 AND (A.CHA_RESPONSAVEL = 'T.I.' OR A.CHA_RESPONSAVEL = '$usuario')
                      ORDER BY 1");
$busca->execute();

    //Seta a Linha como Objeto
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
      $statusnome = $obj->STA_NOME;

      echo("<tr>
          <th scope='row'>$id</th>
          <td>$dscategoria</td>
          <td>$assunto</td>
          <td>$solicitante</td>
          <td>$responsavel</td>
          <td>$statusnome</td>
          <td>$dtabertura</td>
          <td>$dtsolucao</td>
          <td class='last-td' style='width: 110px'>
            <form method='POST' action='res_chamado_adm.php'>
              <input type='hidden' name='alterar' value='$id'>
              <button type='submit' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Responder</button>
            </form>
          </td>
        </tr>");
    }

    ?>
  </tbody>
 </table>
 </div>

 <br>

</div>
</div>      
</div>

</div> <!-- Conteudo -->

<div class="rodape">
<?php include_once('footer.php'); ?>
</div>
           
</div>  <!-- Tudo -->