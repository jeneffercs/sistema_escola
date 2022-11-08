<?php

//controle de sessao
//iniciando a sessao
session_start();

//se a var sessao email nao estiver setada o usuario sera redirecionado para o login
//somente e permitido acesso a essa pagina se a sessao foi iniciada
//apenas o usuario que fez login corretamente podera acessaer esta pagina

if(!isset($_SESSION['email'])){
header('location: ../');
}

?>