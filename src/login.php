<?php
include "conecta_mysql.inc";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Escapar caracteres especiais para segurança na consulta ao banco de dados
    $email = mysqli_real_escape_string($mysqli, $email);

    $sqlCliente = "SELECT * FROM cliente WHERE email = '$email'";
    $resultCliente = mysqli_query($mysqli, $sqlCliente);

    $sqlFuncionario = "SELECT * FROM funcionario WHERE email = '$email'";
    $resultFuncionario = mysqli_query($mysqli, $sqlFuncionario);

    if (!$resultCliente || !$resultFuncionario) {
        echo "Erro na consulta: " . mysqli_error($mysqli);
    } else {
        $rowCliente = mysqli_fetch_assoc($resultCliente);
        $rowFuncionario = mysqli_fetch_assoc($resultFuncionario);

        if (($rowCliente && password_verify($senha, $rowCliente["senha"])) || ($rowFuncionario && password_verify($senha, $rowFuncionario["senha"]))) {
            $_SESSION['email'] = $email; // Guarda o email na sessão após o login bem-sucedido

            // Verifica se há um redirecionamento específico na sessão
            if (isset($_SESSION['redirect_to'])) {
                $redirect_to = $_SESSION['redirect_to'];
                unset($_SESSION['redirect_to']); // Limpa a variável de sessão após usar
                header("Location: $redirect_to");
                exit;
            } else {
                header("Location: agendamento.php");
                exit;
            }
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    }
}

mysqli_close($mysqli);
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css/login.css">
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
