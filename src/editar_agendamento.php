<?php
session_start();
include "conecta_mysql.php"; // Conecta ao banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

// Mensagem de feedback
$mensagem = "";

// Verifica se o ID do agendamento foi passado
$idAgendamento = isset($_GET['id']) ? $_GET['id'] : null;

if (!$idAgendamento) {
    header('Location: meus_agend.php');
    exit;
}

// Carrega o agendamento para edição
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $mysqli->prepare("SELECT * FROM Agendamento WHERE idAgendamento = ?");
    $stmt->bind_param("i", $idAgendamento);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if ($resultado->num_rows == 1) {
        $agendamento = $resultado->fetch_assoc();
    } else {
        $mensagem = "Agendamento não encontrado.";
    }
    $stmt->close();
}

// Atualiza o agendamento no banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idServico = $_POST['idServico'];
    $idFuncionario = $_POST['idFuncionario'];
    $dataConsulta = $_POST['dataConsulta'];
    $horarioConsulta = $_POST['horarioConsulta'];

    $stmt = $mysqli->prepare("UPDATE Agendamento SET idServico = ?, idFuncionario = ?, data_consulta = ?, horario_consulta = ? WHERE idAgendamento = ?");
    $stmt->bind_param("iissi", $idServico, $idFuncionario, $dataConsulta, $horarioConsulta, $idAgendamento);

    if ($stmt->execute()) {
        $mensagem = "Agendamento atualizado com sucesso.";
    } else {
        $mensagem = "Erro ao atualizar o agendamento: " . $stmt->error;
    }
    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Editar Agendamento | Agenda+Saúde</title>
    
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Agendamento</h2>
        <?php if ($mensagem): ?>
            <div class="alert alert-info"><?php echo $mensagem; ?></div>
        <?php endif; ?>

        <?php if (isset($agendamento)): ?>
            <form action="editar_agendamento.php?id=<?php echo $idAgendamento; ?>" method="post">
                <div class="mb-3">
                    <label for="idServico">Serviço:</label>
                    <select class="form-control" id="idServico" name="idServico" required>
                        <option selected>Escolha um serviço...</option>
                        <option value="1" <?php if ($agendamento['idServico'] == 1) echo 'selected'; ?>>Ortopedia</option>
                        <option value="2" <?php if ($agendamento['idServico'] == 2) echo 'selected'; ?>>Vacinação</option>
                        <option value="3" <?php if ($agendamento['idServico'] == 3) echo 'selected'; ?>>Oftalmologia</option>
                        <option value="4" <?php if ($agendamento['idServico'] == 4) echo 'selected'; ?>>Odontológico</option>
                        <option value="5" <?php if ($agendamento['idServico'] == 5) echo 'selected'; ?>>Psicólogo</option>
                        <option value="6" <?php if ($agendamento['idServico'] == 6) echo 'selected'; ?>>Ginecologia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="idFuncionario">Funcionário:</label>
                    <select class="form-control" id="idFuncionario" name="idFuncionario" required>
                        <option value="1" <?php if ($agendamento['idFuncionario'] == 1) echo 'selected'; ?>>Dr. Carlos</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dataConsulta">Data da Consulta:</label>
                    <input type="date" class="form-control" id="dataConsulta" name="dataConsulta" value="<?php echo $agendamento['data_consulta']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="horarioConsulta">Horário da Consulta:</label>
                    <input type="time" class="form-control" id="horarioConsulta" name="horarioConsulta" value="<?php echo $agendamento['horario_consulta']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        <?php else: ?>
            <p>Não foi possível carregar o agendamento para edição.</p>
        <?php endif; ?>
        <a href="meus_agend.php" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>
