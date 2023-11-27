<?php
include "conecta_mysql.php"; // Conecta ao banco de dados

session_start();

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Escapar caracteres especiais para segurança na consulta ao banco de dados
    $email = mysqli_real_escape_string($mysqli, $email);

    // Primeiro verifica na tabela de administradores
    $sqlAdmin = "SELECT * FROM Administrador WHERE email = '$email'";
    $resultAdmin = mysqli_query($mysqli, $sqlAdmin);

    // Depois verifica na tabela de clientes
    $sqlCliente = "SELECT * FROM cliente WHERE email = '$email'";
    $resultCliente = mysqli_query($mysqli, $sqlCliente);

    // Por último, verifica na tabela de funcionários
    $sqlFuncionario = "SELECT * FROM funcionario WHERE email = '$email'";
    $resultFuncionario = mysqli_query($mysqli, $sqlFuncionario);

    if ($resultAdmin) {
        $rowAdmin = mysqli_fetch_assoc($resultAdmin);
        if ($rowAdmin && password_verify($senha, $rowAdmin["senha"])) {
            $_SESSION['email'] = $email;
            $_SESSION['idAdministrador'] = $rowAdmin["idAdministrador"];
            header("Location: index_adm.php"); // Redireciona para a página do administrador
            exit;
        }
    }

    if ($resultCliente) {
        $rowCliente = mysqli_fetch_assoc($resultCliente);
        if ($rowCliente && password_verify($senha, $rowCliente["senha"])) {
            $_SESSION['email'] = $email;
            $_SESSION['idCliente'] = $rowCliente["idCliente"];
            header("Location: index_paciente.php"); // Redireciona para a página do paciente
            exit;
        }
    }

    if ($resultFuncionario) {
        $rowFuncionario = mysqli_fetch_assoc($resultFuncionario);
        if ($rowFuncionario && password_verify($senha, $rowFuncionario["senha"])) {
            $_SESSION['email'] = $email;
            $_SESSION['idFuncionario'] = $rowFuncionario["idFuncionario"];
            header("Location: index_funcionario.php"); // Redireciona para a página do funcionário
            exit;
        }
    }

    // Se o login falhar
    $mensagemErro = "Credenciais inválidas. Tente novamente.";
}

mysqli_close($mysqli);
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css/cad_log.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src=".img/med.png" alt="">
        </div>
        <div class="form">
            <form action="login.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Login</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="cadastro.php">Cadastre-se</a></button>
                    </div>
                </div>

                <div class="input-box">
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                </div>

                <div class="input-box">
                    <label for="senha">Senha</label>
                    <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                </div>
                
                <div class="continue-button">
                    <button type="submit">Entrar</button>
                </div>
                
                <div class="login-button">
                    <button><a href="recuperar_senha.php">Esqueceu sua senha?</a></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
