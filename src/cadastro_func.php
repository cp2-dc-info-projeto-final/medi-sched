<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cargo = $_POST["cargo"];
    
    $erro = false; // Inicializar a variável $erro

    // Validação do nome
    if (empty($nome) || strpos($nome, " ") === false) {
        echo "Preencha o nome completo com sobrenome.<br>";
        $erro = true;
    }

    // Validação do email
    if (strlen($email) < 8 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Preencha um email válido com pelo menos 8 caracteres.<br>";
        $erro = true;
    }

    // Validação da senha
    if (strlen($senha) < 8) {
        echo "A senha deve ter pelo menos 8 caracteres.<br>";
        $erro = true;
    }

    // Verificar se o email já está cadastrado
    $mysqli = new mysqli("localhost", "cadastro", "123", "CADASTRO");
    if ($mysqli->connect_error) {
        die("Erro na conexão: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("SELECT email FROM funcionarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Este endereço de email já está cadastrado.<br>";
        $erro = true;
    }

    $stmt->close();

    if (!$erro) {
        // Usar consultas preparadas para evitar injeção de SQL
        $stmt = $mysqli->prepare("INSERT INTO funcionarios (nome, email, senha, cargo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $senha, $cargo);

        if ($stmt->execute()) {
            echo "O funcionário foi cadastrado com sucesso. Redirecionando para a página inicial...";
            header("Refresh: 3; URL=index.html"); // Redireciona após 3 segundos

        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }

        $stmt->close();
    }

    $mysqli->close();
}
?>
