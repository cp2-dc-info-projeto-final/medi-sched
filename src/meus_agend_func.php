<?php
session_start();
include "conecta_mysql.php";

// Redireciona para o login se o usuário não estiver logado ou não for um funcionário
if (!isset($_SESSION['email']) || !isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 'funcionario') {
    header('Location: login.php');
    exit;
}

$agendamentos = array();

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Seleciona todos os agendamentos
$stmt = $mysqli->prepare("SELECT idAgendamento, idServico, idFuncionario, idCliente, data_consulta, horario_consulta FROM Agendamento");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $agendamentos[] = $row;
    }
} else {
    echo "<p>Não há agendamentos marcados.</p>";
}
$stmt->close();
$mysqli->close();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Seu HTML e meta tags aqui -->
    <title>Agendamentos | Agenda+Saúde</title>
    <!-- Resto do cabeçalho -->
</head>
<body class="fadeIn">
    <!-- Conteúdo do cabeçalho e navegação -->
    <div class="container mt-5">
        <h2>Agendamentos</h2>
        <?php if (count($agendamentos) > 0): ?>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID do Agendamento</th>
                        <th>ID do Serviço</th>
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
                            <td><?php echo htmlspecialchars($agendamento['idServico']); ?></td>
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
