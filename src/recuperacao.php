<?php
include "envia_email.php";
include "conecta_mysql.php"; // Este arquivo deve criar a conexão MySQLi ($mysqli)
session_start();

$email = $_POST['email'];

// Verifica se o e-mail existe
$query = "SELECT email FROM Cliente WHERE email = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // E-mail não encontrado
    $_SESSION['msg_rec'] = "E-mail não encontrado no banco de dados.";
} else {
    // Gera uma nova senha aleatória
    $nova_senha = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);

    $assunto = "Nova Senha Temporária";
    $mensagem = "Sua nova senha temporária é: $nova_senha";

    // Começa a transação
    $mysqli->begin_transaction();

    try {
        // Atualiza a senha no banco de dados
        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $update_query = "UPDATE Cliente SET senha = ? WHERE email = ?";
        $update_stmt = $mysqli->prepare($update_query);
        $update_stmt->bind_param("ss", $senha_hash, $email);
        $update_stmt->execute();

        if(envia_email($email, $assunto, $mensagem)) {
            // Se o e-mail foi enviado com sucesso, commit na transação
            $mysqli->commit();
            $_SESSION['msg_rec'] = "Uma nova senha foi enviada para o seu e-mail.";
        } else {
            // Se falhar o envio do e-mail, rollback na transação
            $mysqli->rollback();
            $_SESSION['msg_rec'] = "Falha ao enviar e-mail.";
        }
    } catch (Exception $e) {
        // Em caso de erro, rollback na transação
        $mysqli->rollback();
        $_SESSION['msg_rec'] = "Erro ao atualizar a senha.";
    }
}

exit;
?>
