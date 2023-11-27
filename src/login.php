<?php
include "conecta_mysql.php"; // Conexão com o banco de dados

session_start();

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Escapar caracteres especiais para segurança na consulta ao banco de dados
    $email = mysqli_real_escape_string($mysqli, $email);

    // Primeiro verifica na tabela de administradores
    $sqlAdmin = "SELECT * FROM Administrador WHERE email = ?";
    $stmtAdmin = $mysqli->prepare($sqlAdmin);
    $stmtAdmin->bind_param("s", $email);
    $stmtAdmin->execute();
    $resultAdmin = $stmtAdmin->get_result();
    $rowAdmin = $resultAdmin->fetch_assoc();

    if ($rowAdmin && password_verify($senha, $rowAdmin["senha"])) {
        $_SESSION['email'] = $email;
        $_SESSION['idAdministrador'] = $rowAdmin["idAdministrador"];
        $_SESSION['tipo_usuario'] = 'administrador'; // Define o tipo de usuário na sessão
        header("Location: index_adm.php"); // Redireciona para a página do administrador
        exit;
    }
    $stmtAdmin->close();

    // Se não for administrador, verifica na tabela de clientes
    $sqlCliente = "SELECT * FROM Cliente WHERE email = ?";
    $stmtCliente = $mysqli->prepare($sqlCliente);
    $stmtCliente->bind_param("s", $email);
    $stmtCliente->execute();
    $resultCliente = $stmtCliente->get_result();
    $rowCliente = $resultCliente->fetch_assoc();

    if ($rowCliente && password_verify($senha, $rowCliente["senha"])) {
        $_SESSION['email'] = $email;
        $_SESSION['idCliente'] = $rowCliente["idCliente"];
        $_SESSION['tipo_usuario'] = 'cliente';
        header("Location: index_paciente.php"); // Redireciona para a página do paciente
        exit;
    }
    $stmtCliente->close();

    // Se não for cliente, verifica na tabela de funcionários
    $sqlFuncionario = "SELECT * FROM Funcionario WHERE email = ?";
    $stmtFuncionario = $mysqli->prepare($sqlFuncionario);
    $stmtFuncionario->bind_param("s", $email);
    $stmtFuncionario->execute();
    $resultFuncionario = $stmtFuncionario->get_result();
    $rowFuncionario = $resultFuncionario->fetch_assoc();

    if ($rowFuncionario && password_verify($senha, $rowFuncionario["senha"])) {
        $_SESSION['email'] = $email;
        $_SESSION['idFuncionario'] = $rowFuncionario["idFuncionario"];
        $_SESSION['tipo_usuario'] = 'funcionario';
        header("Location: index_funcionario.php"); // Redireciona para a página do funcionário
        exit;
    }
    $stmtFuncionario->close();

    // Se o login falhar
    $mensagemErro = "Credenciais inválidas. Tente novamente.";
}

// Sempre feche a conexão depois de usar
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
