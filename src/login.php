<?php
include "conecta_mysql.php"; // Conecta ao banco de dados

session_start();

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Escapar caracteres especiais para segurança na consulta ao banco de dados
    $email = mysqli_real_escape_string($mysqli, $email);

    // Primeiro verifica na tabela de clientes
    $sqlCliente = "SELECT * FROM cliente WHERE email = '$email'";
    $resultCliente = mysqli_query($mysqli, $sqlCliente);

    // Depois verifica na tabela de funcionários
    $sqlFuncionario = "SELECT * FROM funcionario WHERE email = '$email'";
    $resultFuncionario = mysqli_query($mysqli, $sqlFuncionario);

    if (!$resultCliente || !$resultFuncionario) {
        $mensagemErro = "Erro na consulta: " . mysqli_error($mysqli);
    } else {
        $rowCliente = mysqli_fetch_assoc($resultCliente);
        $rowFuncionario = mysqli_fetch_assoc($resultFuncionario);

        if ($rowCliente && password_verify($senha, $rowCliente["senha"])) {
            // Define as variáveis de sessão necessárias
            $_SESSION['email'] = $email;
            $_SESSION['idCliente'] = $rowCliente["idCliente"];
            $_SESSION['tipoUsuario'] = 'cliente'; // Esta linha é opcional, usada para identificar o tipo de usuário

            // Verifica se há uma página de redirecionamento pendente
            if (isset($_SESSION['login_redirect'])) {
                $redirectPage = $_SESSION['login_redirect'];
                unset($_SESSION['login_redirect']);
                header("Location: $redirectPage");
            } else {
                header("Location: index_paciente.php"); // Redireciona para a página do paciente
            }
            exit;
        } elseif ($rowFuncionario && password_verify($senha, $rowFuncionario["senha"])) {
            // Define as variáveis de sessão necessárias
            $_SESSION['email'] = $email;
            $_SESSION['idFuncionario'] = $rowFuncionario["idFuncionario"];
            $_SESSION['tipoUsuario'] = 'funcionario'; // Esta linha é opcional, usada para identificar o tipo de usuário

            header("Location: index_funcionario.php"); // Redireciona para a página do funcionário
            exit;
        } else {
            $mensagemErro = "Credenciais inválidas. Tente novamente.";
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
