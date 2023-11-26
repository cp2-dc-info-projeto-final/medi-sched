<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Status do Agendamento | Agenda+Saúde</title>
    <link rel="stylesheet" href=".css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Status do Agendamento</h2>
        
        <!-- Verifica se existe alguma mensagem na sessão -->
        <?php if(isset($_SESSION['mensagem'])): ?>
            <div class="alert alert-info">
                <?php 
                echo $_SESSION['mensagem']; 
                // Limpar a mensagem após exibição
                unset($_SESSION['mensagem']);
                ?>
            </div>
        <?php endif; ?>
        
        <!-- Botões de ação -->
        <a href="meus_agendamentos.php" class="btn btn-primary">Voltar aos Meus Agendamentos</a>
        <a href="index_paciente.php" class="btn btn-secondary">Voltar ao Início</a>
    </div>
</body>
</html>
