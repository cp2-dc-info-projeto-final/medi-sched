<?php
session_start();

if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    $_SESSION['erro_login'] = "Você não fez o login!";
    header("Location: login.php");
    exit;
}

$email = $_SESSION["email"];
$senha = $_SESSION["senha"];

include "conecta_mysqli.inc"; // Verifique se este arquivo tem as informações corretas para conectar ao banco de dados

$sql = "SELECT * FROM Cliente WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    $_SESSION['erro_login'] = "Usuário não encontrado ou senha incorreta!";
    header("Location: login.php");
    exit;
} else {
    $usuario = $result->fetch_assoc();
    if (!password_verify($senha, $usuario["senha"])) {
        $_SESSION['erro_login'] = "Usuário não encontrado ou senha incorreta!";
        header("Location: login.php");
        exit;
    }
}

mysqli_close($mysqli);
?>
