<!doctype html>
<html lang="pt-br">
<head>
    <title>Área do Funcionário - Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=".css/editaemail.css"/>
    <link rel="shortcut icon" href="caminho_para_seu_arquivo_logo/logo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="fadeIn">
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index_funcionario.php"><img src=".img/logo.png" width="45%"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index_funcionario.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editaemailfunc.php">Redefinir Email</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editasenha.php">Redefinir Senha</a>
                        </li>    
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>                  
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <p>Redefina seu Email!
            Apos redefinir voce sera encaminhado direto para a pagina de login
        </P>
        <form action="editaemailfunc.php" method="POST" class="form-container">
          <input type="hidden" name="operacao" value="editemail">
          <?php
session_start();
include "conecta_mysql.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['tipo_usuario'])) {
    $_SESSION['erro_login'] = "Você precisa fazer login para acessar esta página.";
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$tipo_usuario = $_SESSION['tipo_usuario'];

// Verifica se o usuário é um funcionário no banco de dados
$stmt = $mysqli->prepare("SELECT * FROM Funcionario WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1 || $tipo_usuario !== 'funcionario') {
    $_SESSION['erro_login'] = "Acesso restrito a funcionários.";
    header("Location: login.php");
    exit;
}

$operacao = isset($_POST['operacao']) ? $_POST['operacao'] : '';

if ($operacao === "editemail" && isset($_SESSION["email"])) {
    $emailnovo = $mysqli->real_escape_string($_POST['emailnovo']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $stmt = $mysqli->prepare("SELECT senha FROM funcionario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($senha, $row['senha'])) {
            $stmt = $mysqli->prepare("SELECT email FROM funcionario WHERE email = ? UNION SELECT email FROM cliente WHERE email = ?");
            $stmt->bind_param("ss", $emailnovo, $emailnovo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                $stmt = $mysqli->prepare("UPDATE funcionario SET email = ? WHERE email = ?");
                $stmt->bind_param("ss", $emailnovo, $email);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $_SESSION["email"] = $emailnovo;
                    header("Location: login.php");
                    exit;
                } else {
                    echo "Não foi possível atualizar o email.";
                }
            } else {
                echo "E-mail já cadastrado.";
            }
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "E-mail não encontrado.";
    }

    $stmt->close();
}


mysqli_close($mysqli);
?>

          <p>Seu novo email<input type="email" placeholder="insira aqui" name="emailnovo"></p>
          <p>Insira sua senha atual <input type="password" placeholder="insira aqui" name="senha"></p>
          <p><input type="submit" value="Enviar" class="btn"></p>    
        </form>
    </div>
  </body>
</html>
