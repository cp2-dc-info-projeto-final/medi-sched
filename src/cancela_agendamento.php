<?php
session_start();
include "conecta_mysql.php";

// Verifique se o usuário está logado
if (!isset($_SESSION['email'])) {
    $_SESSION['mensagem'] = "Você precisa estar logado para cancelar um agendamento.";
    header('Location: login.php');
    exit;
}

// Verifique se o ID do agendamento foi fornecido
if (!isset($_GET['idAgendamento'])) {
    $_SESSION['mensagem'] = "ID do agendamento não fornecido.";
    header('Location: status_agendamento.php');
    exit;
}

$idAgendamento = $_GET['idAgendamento'];

// Primeiro, verifique se o agendamento existe
$stmt = $mysqli->prepare("SELECT * FROM Agendamento WHERE idAgendamento = ?");
$stmt->bind_param("i", $idAgendamento);
$stmt->execute();
$result = $stmt->get_result();

// Se não houver agendamento com esse ID, redirecione com uma mensagem
if ($result->num_rows == 0) {
    $_SESSION['mensagem'] = "Agendamento não encontrado.";
    $stmt->close();
    header('Location: status_agendamento.php');
    exit;
}

// O agendamento existe, então podemos prosseguir para cancelá-lo
$stmt->close();
$stmt = $mysqli->prepare("DELETE FROM Agendamento WHERE idAgendamento = ?");
$stmt->bind_param("i", $idAgendamento);

// Tente executar a consulta
if ($stmt->execute()) {
    $_SESSION['mensagem'] = "Agendamento cancelado com sucesso.";
} else {
    $_SESSION['mensagem'] = "Erro ao cancelar o agendamento.";
}

$stmt->close();
$mysqli->close();

// Redirecione de volta para a página de status de agendamentos do usuário
header('Location: status_agendamento.php');
exit;
?>
