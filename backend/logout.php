<?php 
//iniciando a sessao na pagina
session_start();

//limpando as variaveis de sessao
session_unset();

//destroi a sessao
session_destroy();


header('location:../');
?>