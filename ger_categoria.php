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
      <h3 class="panel-title">Para modificar ou remover um registro, clique no botão correspondente:</h3>
    </div>
    <div class="panel-body">
    
<div class="table-responsive">  
<table class="table table-hover" id="datatable">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>

    <?php 

      include_once('conexao.php');
      include_once ('chamado.php');
      $usuario = $_SESSION["login"];

$busca=$pdo->prepare("SELECT CAT_ID, CAT_NOME
                      FROM CATEGORIA
                      ORDER BY 1");
$busca->execute();

    //Seta a Linha como Objeto
    while ($obj=$busca->fetch(PDO::FETCH_OBJ)){

      $id = $obj->CAT_ID;
      $nome = $obj->CAT_NOME;

      echo("<tr>
          <th scope='row'>$id</th>
          <td>$nome</td>
          <td class='last-td' style='width: 110px'>
            <form method='POST' action='alt_categoria.php'>
              <input type='hidden' name='alterar' value='$id'>
              <button type='submit' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Alterar</button>
            </form>
          </td>
          <td class='last-td' style='width: 110px'>
            <form method='POST' action='exc_categoria.php'>
              <input type='hidden' name='excluir' value='$id'>
              <button type='submit' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Remover</button>
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