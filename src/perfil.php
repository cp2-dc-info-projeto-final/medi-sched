<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=".css"/>
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="fadeIn">
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index_adm.php"><img src=".img/logo.png" width="45%"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index_paciente.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="atendimento.php">Atendimentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </div>
    <div id="slider">
        <div class="container">
            <h1>Dados do seu Perfil</h1>
            <form action="perfil.php" method="POST" class="form-container">
            <?php
                include "conecta_mysql.php";
                session_start();

                $_SESSION["email"];

                $sql = "SELECT * FROM cliente WHERE email = '{$_SESSION["email"]}';"; 
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                for($i = 0; $i < $linhas; $i++){
                    $cliente = mysqli_fetch_array($res);
                    echo "<strong>Dados pessoais:</strong><br>";
                    echo "Id Cliente: ".$cliente["idCliente"]."<br>";
                    echo "Nome: ".$cliente["nome_cliente"]."<br>";
                    echo "E-mail: ".$cliente["email"]."<br>";
                    echo "Cpf: ".$cliente["cpf"]."<br";
        
                }
                
            ?>

            </form>
        </div>
</html>
