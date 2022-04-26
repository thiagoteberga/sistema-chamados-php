<?php 
include_once('valida_administrador.php');
valida_administrador();
?>

<link rel='shortcut icon' href='img/favicon.png'>
<div class='tudo'>
<div class='topo'>
<?php include_once('header_adm.php'); ?>
</div>
<div class='conteudo'>

<?php
  
  include_once('conexao.php');
    
  $excluir=$_POST["excluir"];
  
  $busca=$pdo->prepare("SELECT CAT_ID FROM CHAMADO WHERE CAT_ID=:excluir");
  $busca->bindValue(":excluir",$excluir);
  $busca->execute();
  $cont = $busca->rowCount();

  if($cont>=1){
    echo "
  <div class='container'> <!-- Inicio Container -->
                            <div class='container theme-showcase' role='main'>
                                <div class='panel panel-default'> 
                                <div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
                                <div class='panel-body'> 
                                Registro possui chamados vinculados, não pode ser excluído!<br><br>
                                <a href='ger_categoria.php'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
                                </div> 
                                </div>
                            </div>
  </div> <!-- Fim Container -->
    ";
  }else if($cont<1){
  $busca=$pdo->prepare("DELETE FROM CATEGORIA WHERE CAT_ID=:excluir");
  $busca->bindValue(":excluir",$excluir);
  $busca->execute();

        echo "
  <div class='container'> <!-- Inicio Container -->
                            <div class='container theme-showcase' role='main'>
                                <div class='panel panel-default'> 
                                <div class='panel-heading'><h3 class='panel-title'>Aviso</h3></div> 
                                <div class='panel-body'> 
                                Registro excluído com sucesso!<br><br>
                                <a href='ger_categoria.php'><button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-triangle-left' aria-hidden='true'></span> Voltar</button></a>
                                </div> 
                                </div>
                            </div>
  </div> <!-- Fim Container -->
    ";
  }
  
?>


</div>

<div class='rodape'>
<?php include_once('footer.php'); ?>
</div>
           
</div>