<?php
session_start();
include "conecta_mysql.php";

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

$email = $_SESSION['email'];
$agendamentos = array();

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT idCliente FROM Cliente WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$idCliente = null;
if ($row = $result->fetch_assoc()) {
    $idCliente = $row['idCliente'];
}
$stmt->close();

if ($idCliente !== null) {
    $stmt = $mysqli->prepare("SELECT idAgendamento, idServico, idFuncionario, data_consulta, horario_consulta FROM Agendamento WHERE idCliente = ?");
    $stmt->bind_param("i", $idCliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $agendamentos[] = $row;
        }
    } else {
        echo "<p>Você não tem agendamentos marcados.</p>";
 }
    $stmt->close();
}

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
                
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <th>ID do Agendamento</th>
                            <th>ID do Serviço</th>
                            <th>ID do Funcionário</th>
                            <th>ID do Cliente</th>
                            <th>Data da Consulta</th>
                            <th>Horário da Consulta</th>
                        </tr>
                            <td>
                                <td><?php echo htmlspecialchars($agendamento['idAgendamento']); ?></td>
                                <td><?php echo htmlspecialchars($agendamento['idServico']); ?></td>
                                <td><?php echo htmlspecialchars($agendamento['idFuncionario']); ?></td>
                                <td><?php echo isset($agendamento['idCliente']) ? htmlspecialchars($agendamento['idCliente']) : 'Não informado'; ?></td>
                                <td><?php echo htmlspecialchars($agendamento['data_consulta']); ?></td>
                                <td><?php echo htmlspecialchars($agendamento['horario_consulta']); ?></td>
                            </td>
                            <td>
                                <a href="editar_agendamento.php?id=<?php echo $agendamento['idAgendamento']; ?>" class="btn btn-primary btn-sm">Editar</a>
                                <form action="cancela_agendamento.php" method="post" style="display: inline;">
                                    <input type="hidden" name="idAgendamento" value="<?php echo $agendamento['idAgendamento']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja cancelar este agendamento?');">Cancelar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Não existem agendamentos marcados</p>
        <?php endif; ?>
    </div>
</body>
</html>
