!doctype html>
<html lang="pt-br">
<head>
    <title>Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=".css/editaemail.css"/>
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body class="fadeIn">
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index_paciente.php"><img src=".img/logo.png" class="img-center" width="45%"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index_paciente.php">Início</a>
                        </li>
              
                        <li class="nav-item">
                            <a class="nav-link" href="meus_agend.php">Meus Agendamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php">Perfil</a>
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
            <p>Redefina sua Senha!
                Após redefinir você será encaminhado direto para a página de login.
            </p>
            <form action="editasenha.php" method="POST" class="form-container">
                <input type="hidden" name="operacao" value="editsenha">
                
                <p>Senha Atual:<input type="password" placeholder="Insira sua senha atual" name="senhaAtual"></p>
                <p>Nova Senha:<input type="password" placeholder="Insira a nova senha" name="novaSenha"></p>
                <p>Confirme a Nova Senha:<input type="password" placeholder="Confirme a nova senha" name="confirmaSenha"></p>
                <p><input type="submit" value="Enviar" class="btn"></p>
            </form>
        </div>
        <?php
include "conecta_mysql.php";

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['tipo_usuario'])) {
    $_SESSION['erro_login'] = "Você precisa fazer login para acessar esta página.";
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$tipo_usuario = $_SESSION['tipo_usuario'];

// Verifica se o usuário é um cliente no banco de dados
$stmt = $mysqli->prepare("SELECT * FROM Cliente WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Se não encontrar o usuário ou se o tipo na sessão não for 'cliente', redireciona
if ($result->num_rows != 1 || $tipo_usuario !== 'cliente') {
    $_SESSION['erro_login'] = "Acesso restrito a clientes.";
    header("Location: login.php");
    exit;
}

$error_message = ''; // Variável para armazenar mensagens de erro

// Processa a mudança de senha
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operacao']) && $_POST['operacao'] === 'editsenha') {

    $senhaAtual = mysqli_real_escape_string($mysqli, $_POST['senhaAtual']);
    $novaSenha = mysqli_real_escape_string($mysqli, $_POST['novaSenha']);
    $confirmaSenha = mysqli_real_escape_string($mysqli, $_POST['confirmaSenha']);

    // Verifica se as senhas têm mais de 8 caracteres
    if (strlen($novaSenha) < 8 || strlen($confirmaSenha) < 8) {
        $error_message = "A senha deve ter pelo menos 8 caracteres.";
    } else if ($novaSenha === $confirmaSenha) {
        $stmt = $mysqli->prepare("SELECT senha FROM Cliente WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($senhaAtual, $row['senha'])) {
                $hashedNovaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);

                $stmt = $mysqli->prepare("UPDATE Cliente SET senha = ? WHERE email = ?");
                $stmt->bind_param("ss", $hashedNovaSenha, $email);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    // Senha atualizada com sucesso
                    $_SESSION['mensagem_sucesso'] = "Senha atualizada com sucesso.";
                    header("Location: login.php"); 
                    exit;
                } else {
                    $error_message = "Não foi possível atualizar a senha.";
                }
            } else {
                $error_message = "Senha atual incorreta!";
            }
        } else {
            $error_message = "Erro ao buscar informações do usuário.";
        }
        $stmt->close();
    } else {
        $error_message = "As senhas não coincidem.";
    }
}

// Feche a conexão com o banco de dados
mysqli_close($mysqli);

// Exibir mensagem de erro, se houver
if (!empty($error_message)) {
    echo "<p>Erro: " . $error_message . "</p>";
}

?>


    </body>
</html>

