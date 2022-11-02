<?php 

include 'include/conexao.php';

try{

    $sql = "SELECT id,tipo FROM tb_tipos WHERE ativo = 1";

    $comando = $conexao->prepare($sql);

    $comando->execute();

    //Cria variavel e armazena o resulta da execuçao do comando
    $retorno = $comando->fetchAll(PDO::FETCH_ASSOC);

}catch (PDOException $erro){

    $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());
}

$json = json_encode($retorno,JSON_UNESCAPED_UNICODE);

echo $json;

$conexao = null;

?>