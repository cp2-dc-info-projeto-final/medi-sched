<?php
session_start();
include "conecta_mysql.php";

// Redireciona para o login se o usuário não estiver logado ou não for um funcionário
if (!isset($_SESSION['email']) || !isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 'funcionario') {
    header('Location: login.php');
    exit;
}

$email_logado = $_SESSION['email'];
$agendamentos = array();

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Obtém o id do funcionário logado
$stmt = $mysqli->prepare("SELECT idFuncionario FROM Funcionario WHERE email = ?");
$stmt->bind_param("s", $email_logado);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $idFuncionarioLogado = $row['idFuncionario'];
} else {
    die("Funcionário não encontrado.");
}
$stmt->close();

// Seleciona os agendamentos relacionados ao funcionário logado
$stmt = $mysqli->prepare("SELECT idAgendamento, idFuncionario, idCliente, data_consulta, horario_consulta FROM Agendamento WHERE idFuncionario = ?");
$stmt->bind_param("i", $idFuncionarioLogado);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $agendamentos[] = $row;
    }
} else {
}
$stmt->close();
$mysqli->close();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Agendamentos | Agenda+Saúde</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=".css/inicial.css"/>
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
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
                            <a class="nav-link" href="meus_agend_func.php">Ver Agendamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil_func.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</head>
<body class="fadeIn">
    <div class="container mt-5">
        <h2>Agendamentos</h2>
        <?php if (count($agendamentos) > 0): ?>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID do Agendamento</th>
                        <th>ID do Funcionário</th>
                        <th>ID do Cliente</th>
                        <th>Data da Consulta</th>
                        <th>Horário da Consulta</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($agendamento['idAgendamento']); ?></td>
                            <td><?php echo htmlspecialchars($agendamento['idFuncionario']); ?></td>
                            <td><?php echo htmlspecialchars($agendamento['idCliente']); ?></td>
                            <td><?php echo htmlspecialchars($agendamento['data_consulta']); ?></td>
                            <td><?php echo htmlspecialchars($agendamento['horario_consulta']); ?></td>
                            <td>
                                <a href="cancela_agend_func.php?idAgendamento=<?php echo $agendamento['idAgendamento']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja cancelar este agendamento?');">Cancelar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        <?php else: ?>
            <p>Não há agendamentos marcados.</p>
        <?php endif; ?>
    </div>
    <!-- Scripts do Bootstrap -->
</body>
</html>
