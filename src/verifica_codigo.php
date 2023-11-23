<?php
include "envia_email.php";
include "conecta_mysql.php"; 

session_start();

$nome = $_POST['nome']; 
$data = date("d/m/Y"); 
$email = $_POST['email']; 


$recuperacao_codigo = rand(100000, 999999);

$assunto = "Recuperação de Senha";

$mensagem = "Dados para recuperação de senha:<br>";
$mensagem .= "<br><b>Nome:</b> $nome";
$mensagem .= "<br><b>Data:</b> $data";
$mensagem .= "<br><b>E-mail:</b> $email";
$mensagem .= "<br><b>Código de Recuperação:</b> $recuperacao_codigo";
$mensagem .= "<br><br>Clique no link abaixo para redefinir sua senha:";
$mensagem .= "<br><a href='http://seusite.com/redefinir_senha.php?codigo=$recuperacao_codigo'>Redefinir Senha</a>";

if(envia_email($email, $assunto, $mensagem)){
    $_SESSION['msg_rec'] = "Instruções de recuperação de senha foram enviadas para o seu e-mail.";
    header("Location: verifica_codigo.php"); // Redireciona para a página inicial de recuperação
} else {
    $_SESSION['msg_rec'] = "Falha no envio do e-mail. Por favor, tente novamente.";
    header("Location: recuperar_senha.php"); // Redireciona para a página inicial de recuperação
}
exit;
?>
