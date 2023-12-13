<?php
include "envia_email.php";
include "conecta_mysql.php"; // Este arquivo deve criar a conexão MySQLi ($mysqli)
session_start();

$email = $_POST['email'];

// Gera uma nova senha aleatória
$nova_senha = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
$senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

$assunto = "Nova Senha Temporária";
$mensagem = "Sua nova senha temporária é: $nova_senha";

// Função para atualizar a senha
function atualizaSenha($mysqli, $email, $senha_hash, $tabela) {
    $update_query = "UPDATE $tabela SET senha = ? WHERE email = ?";
    $update_stmt = $mysqli->prepare($update_query);
    $update_stmt->bind_param("ss", $senha_hash, $email);
    $update_stmt->execute();
    return $update_stmt->affected_rows > 0;
}

$tab_nomes = ["Cliente", "Funcionario", "Administrador"];
$senhaAtualizada = false;

// Começa a transação
$mysqli->begin_transaction();

try {
    foreach ($tab_nomes as $tab_nome) {
        $query = "SELECT email FROM $tab_nome WHERE email = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            if (atualizaSenha($mysqli, $email, $senha_hash, $tab_nome)) {
                $senhaAtualizada = true;
                break;
            }
        }
    }

    if ($senhaAtualizada && envia_email($email, $assunto, $mensagem)) {
        $mysqli->commit();
        $_SESSION['msg_rec'] = "Uma nova senha foi enviada para o seu e-mail.";
    } else {
        $mysqli->rollback();
        $_SESSION['msg_rec'] = "Falha ao enviar e-mail ou atualizar a senha.";
    }
} catch (Exception $e) {
    $mysqli->rollback();
    $_SESSION['msg_rec'] = "Erro ao atualizar a senha.";
}


?>
