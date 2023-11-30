<?php
include "conecta_mysql.php"; // Conecta ao banco de dados
include "autentica_paciente.php"; // Autenticação do paciente


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

header('Location: meus_agend.php');
exit;
?>

