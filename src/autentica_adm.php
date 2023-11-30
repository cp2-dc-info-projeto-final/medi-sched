<?php
session_start();

// Inclui o arquivo de conexão com o banco de dados
include "conecta_mysql.php";

// Verifica se o usuário está logado e se é um administrador
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'administrador') {
    // Usuário não está logado ou não é um administrador
    // Redireciona para a página de login
    header("Location: login.php");
    exit; // Impede a execução do restante do script
}
?>
