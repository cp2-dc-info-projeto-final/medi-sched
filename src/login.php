<?php
$mysqli = mysqli_connect("localhost", "agendasaude", "123", "AGENDASAUDE");
if (!$mysqli) {
    die("Erro na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($mysqli, $sql);

    if (!$result) {
        echo "Erro na consulta: " . mysqli_error($mysqli);
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Login bem-sucedido, redirecionar para a página inicial
            header("location: index.html");
            exit; // Certifique-se de sair do script após o redirecionamento
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
    <link rel="stylesheet" href="stylese.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="med.png" alt="">
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
            </form>
        </div>
    </div>
</body>

</html>
