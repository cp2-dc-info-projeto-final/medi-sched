<?php
include "conecta_mysql.php"; // Conecta ao banco de dados

// Inicia a sessão
session_start();
// Se existe uma mensagem de status na sessão, exibe e limpa a mensagem
if (isset($_SESSION['mensagem_status'])) {
    echo "<p>" . $_SESSION['mensagem_status'] . "</p>";
    unset($_SESSION['mensagem_status']); // Limpa a mensagem de status da sessão
}

if (!isset($_SESSION['idAdministrador'])) {
    header('Location: login.php');
    exit;
}

// Consulta para buscar todos os funcionários cadastrados no banco de dados
$sql = "SELECT idFuncionario, nome_funcionario, sobrenome_funcionario, email, area, genero, data_nascimento, cpf FROM Funcionario";
$resultado = $mysqli->query($sql);

if (!$resultado) {
    die("Erro na consulta: " . $mysqli->error);
}

$funcionarios = [];
while ($linha = $resultado->fetch_assoc()) {
    $funcionarios[] = $linha;
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
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=".css/mostrar.css"/>
</head>
<body class="fadeIn">
<div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index.php"><img src=".img/logo.png" class="img-center" width="25%"/></a>
          
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index_paciente.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="atendimentos.php">Atendimentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#rodape">Sobre</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <h2>Funcionários Cadastrados</h2>
        <table>
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
                    <a href="editar_funcionario.php?id=<?php echo $funcionario['idFuncionario']; ?>">Editar</a>
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

