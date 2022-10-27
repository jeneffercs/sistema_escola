<?php 

include 'include/conexao.php';

try {

    $email = $_POST['email'];  //[] sempre o que tiver no name
    $senha = $_POST['senha'];
    
    $sql = "SELECT email,senha FROM tb_usuarios WHERE email='$email' AND BINARY senha='$senha'";

    $comando = $conexao->prepare($sql);
    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    //se o usuario e senha estiverem corretos (!= sig: DIFERENTE)
    if($dados !=null){

        //start na sessao
        session_start();
        //cria a variavel de sessao email e atribui valor
        $_SESSION['email'] = $email;

        //cria um array para ser convertido em json
        $retorno = array("retorno"=>"ok","mensagem"=>"Login efetuado com sucesso!");

    }else{

        $retorno = array("retorno"=>"erro","mensagem"=>"Dados inválidos!");

    }

} catch (PDOException $erro) {

    $retorno = array("retorno"=>"erro","mensagem"=>$erro->getMessage());

}


$json = json_encode($retorno,JSON_UNESCAPED_UNICODE);
echo $json;


$conexao=null;

?>
