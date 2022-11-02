<?php
    try {
        //dados da conexão com o BD
        define('SERVIDOR', '10.97.46.121');
        define('USUARIO', 'jheny');
        define('SENHA', 'senac');
        define('BASEDADOS', 'db_escola_jheny');

        $conexao = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDADOS.";charset=utf8", USUARIO, SENHA);
        // set the PDO error mode to exception
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";

        
    } catch (PDOException $erro) {
        
        $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());
        $json = json_encode($retorno,JSON_UNESCAPED_UNICODE);
        echo $json;
        exit;
}
