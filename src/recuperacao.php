<?php
include "envia_email.php";
include "conecta_mysql.php"; // Se você precisar conectar-se ao banco de dados

session_start();

$email = $_POST['email']; 

// Gerar uma senha aleatória de 6 dígitos
$recuperacao_senha = rand(100000, 999999);

// Criptografar a senha antes de armazená-la no banco de dados
$senha_criptografada = password_hash($recuperacao_senha, PASSWORD_DEFAULT);

// Atualizar a senha no banco de dados para o usuário com o email fornecido
$sql = "UPDATE Cliente SET senha = ? WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$senha_criptografada, $email]);

$assunto = "Recuperação de Senha";

$mensagem = "Dados para recuperação de senha:<br>";
$mensagem .= "<br><b>Nome:</b>";
$mensagem .= "<br><b>Data:</b>";
$mensagem .= "<br><b>E-mail:</b> $email";
$mensagem .= "<br><b>Nova Senha:</b> $recuperacao_senha"; // Mostrar a nova senha gerada

if(envia_email($email, $assunto, $mensagem)){
    $_SESSION['msg_rec'] = "Instruções de recuperação de senha foram enviadas para o seu e-mail.";
    header("Location: recuperar_cod.php"); // Redireciona para a página inicial de recuperação
} else {
    $_SESSION['msg_rec'] = "Falha no envio do e-mail. Por favor, tente novamente.";
    header("Location: recuperar_senha.php"); // Redireciona para a página inicial de recuperação
}
exit;
?>

