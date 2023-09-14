<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cargo = $_POST["cargo"];

    // Criptografar a senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Conectar ao banco de dados
    $mysqli = new mysqli("localhost", "cadastro", "123", "CADASTRO");

    if ($mysqli->connect_error) {
        die("Erro na conexão: " . $mysqli->connect_error);
    }

    // Usar consultas preparadas para evitar injeção de SQL
    $stmt = $mysqli->prepare("INSERT INTO funcionarios (nome, email, senha, cargo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $senhaHash, $cargo);

    if ($stmt->execute()) {
        echo "O funcionário foi cadastrado com sucesso. Redirecionando para a página inicial...";
        header("Refresh: 3; URL=index.html"); // Redireciona após 3 segundos

    } else {
        echo "Erro ao inserir dados: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
}
?>
