<?php
include "autentica_adm.php";
?>

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
                            <a class="nav-link" href="funcionario.php">Cadastrar Funcionario</a>
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
    
    <!-- Seção Principal -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Bem-vindo à Área do Administrador</h1>
                <p class="text-center">Gerencie consultas e visualize agendamentos.</p>
            </div>
        </div>

        <!-- Botão de Ação -->
            <div class="col-lg-4 mb-3">
                <a href="mostrar_funcionarios.php" class="btn btn-success" class="text-center">Ver Funcionarios</a>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2023 Direitos Autorais: Agenda+Saúde</span>
        </div>
    </footer>

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
