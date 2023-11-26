<?php
session_start();
include "conecta_mysql.php";

$mensagem = "";
$agendamento = null;

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

// Verifica se o ID do agendamento foi passado
if (isset($_GET['id'])) {
    $idAgendamento = $_GET['id'];

    // Busca os detalhes do agendamento
    $stmt = $mysqli->prepare("SELECT * FROM Agendamento WHERE idAgendamento = ?");
    $stmt->bind_param("i", $idAgendamento);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $agendamento = $result->fetch_assoc();
    } else {
        $mensagem = "Agendamento não encontrado.";
    }
    $stmt->close();
} else {
    header('Location: meus_agend.php');
    exit;
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idServico = $_POST["idServico"];
    $idFuncionario = $_POST["idFuncionario"];
    $dataConsulta = $_POST["dataConsulta"];
    $horarioConsulta = $_POST["horarioConsulta"];

    // Atualiza os detalhes do agendamento
    $stmt = $mysqli->prepare("UPDATE Agendamento SET idServico = ?, idFuncionario = ?, data_consulta = ?, horario_consulta = ? WHERE idAgendamento = ?");
    $stmt->bind_param("iissi", $idServico, $idFuncionario, $dataConsulta, $horarioConsulta, $idAgendamento);
    if ($stmt->execute()) {
        $mensagem = "Agendamento atualizado com sucesso.";
    } else {
        $mensagem = "Erro ao atualizar agendamento: " . $stmt->error;
    }
    $stmt->close();
}

$mysqli->close();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Editar Agendamento | Agenda+Saúde</title>
    <!-- Incluir CSS e outros -->
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Agendamento</h2>
        <?php if ($mensagem): ?>
            <div class="alert alert-info">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
        <?php if ($agendamento): ?>
            <form action="editar_agendamento.php?id=<?php echo $idAgendamento; ?>" method="post">
                <div class="form-group">
                    <label for="idServico">Serviço:</label>
                    <input type="number" class="form-control" name="idServico" value="<?php echo $agendamento['idServico']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="idFuncionario">Funcionário:</label>
                    <input type="number" class="form-control" name="idFuncionario" value="<?php echo $agendamento['idFuncionario']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="dataConsulta">Data da Consulta:</label>
                    <input type="date" class="form-control" name="dataConsulta" value="<?php echo $agendamento['data_consulta']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="horarioConsulta">Horário da Consulta:</label>
                    <input type="time" class="form-control" name="horarioConsulta" value="<?php echo $agendamento['horario_consulta']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        <?php endif; ?>
        <a href="meus_agend.php" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>
