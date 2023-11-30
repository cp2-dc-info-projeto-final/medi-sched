<?php
include "autentica_adm.php"; // Autenticação de administrador
include "conecta_mysql.php"; // Conexão com o banco de dados

session_start();

// Verifica se o ID foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id'])) {
    $idFuncionario = $_POST['id'];

    // Prepara a declaração para exclusão
    if ($stmt = $mysqli->prepare("DELETE FROM Funcionario WHERE idFuncionario = ?")) {
        // Vincula os parâmetros e executa
        $stmt->bind_param("i", $idFuncionario);
        if ($stmt->execute()) {
            $_SESSION['mensagem_status'] = "Funcionário excluído com sucesso.";
        } else {
            $_SESSION['mensagem_status'] = "Erro ao excluir o funcionário: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['mensagem_status'] = "Erro ao preparar a declaração: " . $mysqli->error;
    }
} else {
    $_SESSION['mensagem_status'] = "ID do funcionário não fornecido.";
}

$mysqli->close();

// Redireciona de volta para a lista de funcionários após a exclusão
header('Location: mostrar_funcionarios.php');
exit;
?>
