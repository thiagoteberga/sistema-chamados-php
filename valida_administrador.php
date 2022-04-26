<?php
session_start();
function valida_administrador() {
if (null == $_SESSION['login'] || null == $_SESSION['senha'] || '2' == $_SESSION['tipo'] || null == $_SESSION["nome"] || null == $_SESSION['tipo']) {
//Não há usuário logado, manda pra página de login
header("Location:index.php");
session_destroy();
}
}
?>