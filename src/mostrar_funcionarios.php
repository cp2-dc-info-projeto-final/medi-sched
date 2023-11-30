<?php
include "autentica_adm.php";
include "conecta_mysql.php";

// Verifica se a sessão já foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$result = $mysqli->query("SELECT * FROM Funcionario");

$funcionarios = array();
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $funcionarios[] = $row;
    }
}

$mysqli->close();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Funcionários</title>
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
                            <a class="nav-link active" aria-current="page" href="index_adm.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastro_funcionario.php">Cadastrar Funcionario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil_adm.php">Perfil</a>
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
        <h2>Funcionários Cadastrados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Área</th>
                    <th>Gênero</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($funcionario['idFuncionario']); ?></td>
                    <td><?php echo htmlspecialchars($funcionario['nome_funcionario'] . ' ' . $funcionario['sobrenome_funcionario']); ?></td>
                    <td><?php echo htmlspecialchars($funcionario['email']); ?></td>
                    <td><?php echo htmlspecialchars($funcionario['area']); ?></td>
                    <td><?php echo htmlspecialchars($funcionario['genero']); ?></td>
                    <td><?php echo htmlspecialchars($funcionario['data_nascimento']); ?></td>
                    <td><?php echo htmlspecialchars($funcionario['cpf']); ?></td>
                    <td>
                        <!-- Formulário de exclusão -->
                        <form action="excluir_funcionario.php" method="post" onsubmit="return confirm('Tem certeza que deseja deletar este funcionário?');">
                            <input type="hidden" name="id" value="<?php echo $funcionario['idFuncionario']; ?>">
                            <input type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
   <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggler = document.querySelector('.navbar-toggler');
            const navbarCollapse = document.querySelector('.navbar-collapse');

            toggler.addEventListener('click', function() {
                navbarCollapse.classList.toggle('active');
            });
        });
    </script>
</body>
</html>


