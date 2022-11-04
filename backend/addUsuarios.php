<?php

include 'include/conexao.php';

try{

    //array para limpeza dos campos
    $limpa = array('.','-','(',')',' ');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = str_replace($limpa,'',$_POST['telefone']);
    $cpf = str_replace($limpa,'',$_POST['cpf']);
    $nascimento = $_POST['nascimento'];
    

    //endereço
    $cep = str_replace($limpa,'',$_POST['cep']);
    $rua = $_POST['rua'];
    $numero = str_replace($limpa,'',$_POST['numero']);
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];

    //validação do campo tipo -disbabled no option do form
    if(!isset($_POST['tipo'])){

        $retorno = array("retorno"=>"erro","mensagem"=>"Escolha o tipo do cadastro");
        $json = json_encode($retorno,JSON_UNESCAPED_UNICODE);
        echo $json;
        exit;
    }else{
        $tipo = $_POST['tipo'];

    }

    //conversao da data ara o formato 01-10-2000
    //$senha = implode('-',array_reverse(explode('-',$nascimento)));

    //converter a data e remove o separador - : 01102000
    $senha = date('dmY',strtotime($nascimento));

    $senha = sha1($senha);

    //ATENÇÃOOO
    //Necessario implementar validaçao de campos vazios
    //necessario implementar valdiaçao de CPF E EMAIL ja cadastrados
    //ATENÇÃOOO FINAL


    //insercao dos dados do usuario na tb_usuario
    $sql= "INSERT INTO tb_usuarios(nome,cpf,telefone,email,data_nascimento,senha,id_tipo)VALUES('$nome','$cpf','$telefone','$email','$nascimento','$senha','$tipo')";

    $comando = $conexao->prepare($sql);
    $comando->execute();

    //captura o id da tabela do comando ex3ecutado acima
    //necessario esse id para insert na tabela de endereço
    $id_usuario = $conexao -> lastInsertId();


    //========  endereço  ========
    //cadastra o endereço na tb_endereços

    $sql = "INSERT INTO tb_enderecos(rua,numero,cep,bairro,cidade,estado,complemento,id_usuario)VALUES('$rua','$numero','$cep','$bairro','$cidade','$estado','$complemento','$id_usuario')";

    $comando = $conexao->prepare($sql);

    $comando -> execute();

    $retorno = array("retorno"=>"ok","mensagem"=>"Usuário inserido com sucesso !");

    // ====== final endereço =====



}catch(PDOException $erro){

    $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());

}

    $json = json_encode($retorno,JSON_UNESCAPED_UNICODE);

    echo $json;

    $conexao = null;




?>