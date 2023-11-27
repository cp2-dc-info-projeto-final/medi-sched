<?php
session_start();

// Certifique-se de que uma mensagem de status foi definida
if (!isset($_SESSION['mensagemStatus'])) {
    // Se não houver uma mensagem de status, redirecione para a página principal
    header('Location: index_paciente.php');
    exit;
}

// Armazena a mensagem de status e limpa-a da sessão
$mensagemStatus = $_SESSION['mensagemStatus'];
unset($_SESSION['mensagemStatus']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Status do Agendamento | Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <div class="container mt-5">
        <h2>Status do Agendamento</h2>
        <div class="alert alert-info" role="alert">
            <?php echo htmlspecialchars($mensagemStatus); ?>
        </div>
        <div class="mt-3">
            <a href="index_paciente.php" class="btn btn-primary">Voltar para a Página Inicial</a>
        </div>
    </div>
</body>
</html>
