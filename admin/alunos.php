<?php
//controle de sessao
//iniciando a sessao
session_start();

//se a var sessao email nao estiver setada o usuario sera redirecionado para o login
//somente e permitido acesso a essa pagina se a sessao foi iniciada
//apenas o usuario que fez login corretamente podera acessar esta pagina
if (!isset($_SESSION['email'])) {
    header('location: ../');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistema Escola</title>
    <link rel="stylesheet" href="assets/css/style-admin.css">
</head>

<body>
    <div class="container">

        <aside class="admin-menu">
            <div class="admin-logo">Sistema - ADMIN</div>
            <nav>

                <ul>
                    <li>
                        <a href="index.php" class="menu-ativo"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="professores.php"><i class="fa-solid fa-person-chalkboard"></i> Professores </a>
                    </li>
                    <li>
                        <a href="alunos.php"><i class="fa-solid fa-user-graduate"></i> Alunos </a>
                    </li>
                    <li>
                        <a href="notas.php"><i class="fa-regular fa-file"></i> Notas </a>
                    </li>
                    <hr>
                    <li>
                        <a href="../backend/logout.php">
                            <i class="fa-solid fa-power-off"> Logout</i>
                        </a>
                    </li>
                </ul>

            </nav>

            <!-- <div class="admin-logout">
            </div> -->

        </aside>
        <!--  aqui será o conteudo da pagina -->
        <main class="admin-corpo">

            <h2>Portal Aluno</h2>
            <div class="div-alunos">
                <div class="grid-alunos">
                    <div>
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div>
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone">
                    </div>
                    <div>
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf">
                    </div>
                    <div>
                        <label for="cep">CEP</label>
                        <div>
                            <input class="input-cep" type="text" name="cep" id="cep">
                            <button class="btn-cep" type="button" onclick="consultaCEP()"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                    <div>
                        <label for="rua">Rua</label>
                        <input type="text" name="rua" id="rua">
                    </div>

                    <div>
                        <label for="numero">Numero</label>
                        <input type="text" name="numero" id="numero">
                    </div>

                    <div>
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro">
                    </div>

                    <div>
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade">
                    </div>

                    <div>
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" id="estado">
                    </div>
                    <div>
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" id="complemento">
                    </div>

                    <div>
                        <label for="curso">Curso</label>
                        <input type="text" name="curso" id="curso">
                    </div>

                    <div>
                        <label for="ano">Ano Letivo</label>
                        <input type="month" name="ano" id="ano">
                    </div>

                    <div>
                        <label for="turma">Turma</label>
                        <input type="text" name="turma" id="turma">
                    </div>




                </div>


                <button type="button" class="btn-cadastrar" onclick="addAluno()">Cadastrar</button>


            </div>

        </main>


    </div>

    <script src="https://kit.fontawesome.com/ab3aa42d48.js" crossorigin="anonymous"></script>


    <script src="assets/js/script-admin.js"></script>
</body>

</html>