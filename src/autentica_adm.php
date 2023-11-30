<?php
session_start();

// Inclui o arquivo de conexão com o banco de dados
include "conecta_mysql.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['tipo_usuario'])) {
    $_SESSION['erro_login'] = "Você precisa fazer login para acessar esta página.";
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$tipo_usuario = $_SESSION['tipo_usuario'];

// Verifica se o usuário é um administrador no banco de dados
$stmt = $mysqli->prepare("SELECT * FROM Administrador WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Se não encontrar o usuário ou se o tipo na sessão não for 'administrador', redireciona
if ($result->num_rows != 1 || $tipo_usuario !== 'administrador') {
    $_SESSION['erro_login'] = "Acesso restrito a administradores.";
    header("Location: login.php");
    exit;
}

// Fecha a conexão com o banco de dados
mysqli_close($mysqli);
?>
