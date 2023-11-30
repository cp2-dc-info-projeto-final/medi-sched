<?php
// Conexão com o banco de dados
include "conecta_mysql.php";

session_start();

// Inicializa a mensagem de erro como vazia
$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o email e a senha do formulário de login
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $senha = $_POST["senha"];

    // Tenta autenticar como administrador
    $sql = "SELECT * FROM Administrador WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($senha, $row["senha"])) {
            $_SESSION['email'] = $email;
            $_SESSION['tipo_usuario'] = 'administrador';
            header("Location: index_adm.php");
            exit;
        }
    }

    // Tenta autenticar como cliente
    $sql = "SELECT * FROM Cliente WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($senha, $row["senha"])) {
            $_SESSION['email'] = $email;
            $_SESSION['tipo_usuario'] = 'cliente';
            header("Location: index_paciente.php");
            exit;
        }
    }

    // Tenta autenticar como funcionário
    $sql = "SELECT * FROM Funcionario WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($senha, $row["senha"])) {
            $_SESSION['email'] = $email;
            $_SESSION['tipo_usuario'] = 'funcionario';
            header("Location: index_funcionario.php");
            exit;
        }
    }

    // Se chegou aqui, o login falhou
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

                <?php if (!empty($mensagemErro)): ?>
                    <div class="error-message">
                        <p><?php echo $mensagemErro; ?></p>
                    </div>
                <?php endif; ?>

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
