<?php
session_start();
function valida_usuario() {
if (null == $_SESSION['login'] || null == $_SESSION['senha'] || '1' == $_SESSION['tipo'] || null == $_SESSION["nome"] || null == $_SESSION['tipo']) {
//N�o h� usu�rio logado, manda pra p�gina de login
header("Location:index.php");
session_destroy();
}
}
?>