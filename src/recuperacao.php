<?php

session_start();

include "conecta_mysql.inc"; 

$email = $_REQUEST["emailrec"];
$stmt = $mysqli->prepare("SELECT * FROM Cliente WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

$code = rand(100000,999999);

if ($cliente) {
    include "envia_email.php"; 

    $para = $cliente["email"];
    $assunto = "Recuperação de senha | Agenda+Saúde";
    $mensagem = "<h2>Redefina sua senha</h2><br><small>Cliente Agenda+Saúde</small><br><h3>Seu código de redefinição de senha é:</h3><h2>$code</h2><br><small>Agenda+Saúde</small>";

    if (envia_email($para, $assunto, $mensagem)) {
        $_SESSION['msg_rec'] = "<div class='alert alert-success' role='alert'>Digite o código enviado para o seu e-mail!</div>";
        $_SESSION['cod_senha'] = $code;
        $_SESSION['email_cliente'] = $email;
        header("Location: recuperar_cod.php");
        exit;
    } else {
        $_SESSION['msg_rec'] = "<div class='alert alert-danger'>Houve um erro ao enviar o e-mail.</div>";
        header("Location: recuperar_senha.php");
        exit;
    }
} else {
    $_SESSION['msg_rec'] = "<div class='alert alert-danger'>Email não encontrado.</div>";
    header("Location: recuperar_senha.php");  
    exit;
}

$stmt->close();
$mysqli->close();
?>
