<?php
session_start();
include "conecta_mysql.inc"; 

// Verifica se o cliente está logado e se o e-mail está na sessão
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redireciona para a página de login se não estiver logado
    exit;
}

$email = $_SESSION['email'];
$agendamentos = array();

// Conecta ao banco de dados e busca os agendamentos
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}
//seleciona registros
$stmt = $mysqli->prepare("SELECT A.idAgendamento, A.data_consulta, A.horario_consulta, S.nome_servico, F.nome_funcionario 
                          FROM Agendamento A
                          INNER JOIN Servico S ON A.idServico = S.idServico
                          INNER JOIN Funcionario F ON A.idFuncionario = F.idFuncionario
                          WHERE C.email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $agendamentos[] = $row;
    }
}

$stmt->close();
$mysqli->close();

$stmt = $mysqli->prepare("SELECT idAgendamento, idServico, idFuncionario, idCliente, data_consulta, horario_consulta FROM Agendamento WHERE idCliente = ?");
$stmt->bind_param("i", $idCliente);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $agendamentos[] = $row;
    }
}

$stmt->close();
$mysqli->close();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Meus Agendamentos | Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <div class="container mt-5">
        <h2>Meus Agendamentos</h2>
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): 
                        //converte caracteres predefinidos em entidades HTML
                        ?>
                    
                    <tr>
                    
                        <td><?php echo htmlspecialchars($agendamento['idAgendamento']); ?></td>
                        <td><?php echo htmlspecialchars($agendamento['idServico']); ?></td>
                        <td><?php echo htmlspecialchars($agendamento['idFuncionario']); ?></td>
                        <td><?php echo htmlspecialchars($agendamento['idCliente']); ?></td>
                        <td><?php echo htmlspecialchars($agendamento['data_consulta']); ?></td>
                        <td><?php echo htmlspecialchars($agendamento['horario_consulta']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você não tem agendamentos marcados.</p>
        <?php endif; ?>
    </div>
</body>
</html>
