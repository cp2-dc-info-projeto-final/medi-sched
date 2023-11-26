<?php
session_start();
include "conecta_mysql.php";

if (!isset($_SESSION['idCliente'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idAgendamento'])) {
    $idAgendamento = $_POST['idAgendamento'];

    // Prepare a statement for deletion
    $stmt = $mysqli->prepare("DELETE FROM Agendamento WHERE idAgendamento = ? AND idCliente = ?");
    $stmt->bind_param("ii", $idAgendamento, $_SESSION['idCliente']);

    if ($stmt->execute()) {
        $_SESSION['mensagemStatus'] = "Agendamento cancelado com sucesso.";
    } else {
        $_SESSION['mensagemStatus'] = "Erro ao cancelar o agendamento: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    $_SESSION['mensagemStatus'] = "ID do agendamento não foi fornecido.";
}

header('Location: status_agendamento.php');
exit;
?>



<!doctype html>
<html lang="pt-br">
<head>
    <title>Cancelar Agendamento | Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    <div class="container mt-5">
        <h2>Cancelar Agendamento</h2>

        <!-- Exibe a mensagem de sucesso -->
        <?php if (!empty($mensagemSucesso)): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $mensagemSucesso; ?>
            </div>
        <?php endif; ?>

        <!-- Exibe a mensagem de erro -->
        <?php if (!empty($mensagemErro)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $mensagemErro; ?>
            </div>
        <?php endif; ?>

        <form action="cancelar_agendamento.php" method="post">
            <div class="mb-3">
                <label for="idAgendamento" class="form-label">ID do Agendamento</label>
                <input type="number" class="form-control" id="idAgendamento" name="idAgendamento" placeholder="Digite o ID do agendamento" required>
            </div>
            <button type="submit" class="btn btn-danger">Cancelar Agendamento</button>
        </form>
    </div>
</body>
</html>
