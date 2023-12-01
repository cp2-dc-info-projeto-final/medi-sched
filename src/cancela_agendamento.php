<?php
include "conecta_mysql.php";

if (isset($_GET['idAgendamento'])) {
    $idAgendamento = $_GET['idAgendamento'];

    // Prepara a declaração para cancelar o agendamento
    if ($stmt = $mysqli->prepare("DELETE FROM Agendamento WHERE idAgendamento = ?")) {
        $stmt->bind_param("i", $idAgendamento);

        if ($stmt->execute()) {
            echo "Agendamento cancelado com sucesso.";
        } else {
            echo "Erro ao cancelar o agendamento: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a declaração: " . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo "ID do agendamento não fornecido.";
}

// Redireciona de volta para a página de agendamentos
header("Location: meus_agend.php");
exit;
?>
