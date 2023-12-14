<!doctype html>
<html lang="pt-br">
<head>
    <title>Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=".css/perfil.css"/>
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
                            <a class="nav-link" href="editaemail.php">Redefinir Email</a>
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
            <h1>Dados do seu Perfil</h1>
            <form action="perfil.php" method="POST" class="form-container">
            <?php
                include "autentica_paciente.php";
                include "conecta_mysql.php";

                if (!isset($_SESSION["email"])) {
                    echo "Usuário não autenticado.";
                    exit; 
                }
                
                $email = $_SESSION["email"];
                
                $stmt = $mysqli->prepare("SELECT * FROM cliente WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    while ($cliente = $result->fetch_assoc()) {
                        echo "<strong>Dados pessoais:</strong><br>";
                        echo "Id Cliente: " . $cliente["idCliente"] . "<br>";
                        echo "Nome: " . $cliente["nome_cliente"] . " ". $cliente["sobrenome_cliente"]. "<br>";
                        echo "E-mail: " . $cliente["email"] . "<br>";
                        echo "Cpf: " . $cliente["cpf"] . "<br>";
                    }
                } 
                $stmt->close();
                $mysqli->close();
                ?>
            </form>
        </div>
</html>
