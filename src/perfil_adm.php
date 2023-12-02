<!doctype html>
<html lang="pt-br">
<head>
    <title>Área do Funcionário - Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="caminho_para_seu_arquivo_css/inicial_funcionario.css"/>
    <link rel="shortcut icon" href="caminho_para_seu_arquivo_logo/logo.png" type="image/x-icon" />
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
                            <a class="nav-link active" aria-current="page" href="index_adm.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastro_func.php">Cadastrar Funcionario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editaemailadm.php">Redefinir Email</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editasenhaadm.php">Redefinir Senha</a>
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
            <form action="perfil_adm.php" method="POST" class="form-container">
            <?php
                include "autentica_adm.php";
                include "conecta_mysql.php";

                if (!isset($_SESSION["email"])) {
                    echo "Usuário não autenticado.";
                    exit; 
                }
                
                $email = $_SESSION["email"];
                
                $stmt = $mysqli->prepare("SELECT * FROM administrador WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    while ($administrador = $result->fetch_assoc()) {
                        echo "<strong>Dados pessoais:</strong><br>";
                        echo "Id Administrador: " . $administrador["idAdministrador"] . "<br>";
                        echo "Nome: " . $administrador["nome_administrador"] . "<br>";
                        echo "E-mail: " . $administrador["email"] . "<br>";
                    }
                } 
                $stmt->close();
                $mysqli->close();
                ?>

            </form>
        </div>
</html>
