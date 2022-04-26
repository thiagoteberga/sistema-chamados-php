<?php
try{
$pdo=new PDO ("mysql:host=127.0.0.1;dbname=chamados","root","");
 
}
catch (PDOException $e)
{
echo"Conexão falha<br>".$e->getMessage();
}
?>