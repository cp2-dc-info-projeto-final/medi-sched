<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    
    $erro = false; // Inicializar a variável $erro

    // Validação do nome
    if (empty($nome) || strpos($nome, " ") === false) {
        echo "Preencha seu nome completo com sobrenome.<br>";
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

    // Validação do CPF (pode ser mais rigorosa)
    if (empty($cpf) || !is_numeric($cpf) || strlen($cpf) != 11) {
        echo "Preencha um CPF válido com 11 dígitos numéricos.<br>";
        $erro = true;
    }

    // Validação da data de nascimento (pode ser mais rigorosa)
    if (empty($data_nascimento) || !strtotime($data_nascimento)) {
        echo "Preencha uma data de nascimento válida no formato YYYY-MM-DD.<br>";
        $erro = true;
    }

    // Verificar se o email já está cadastrado
    $mysqli = new mysqli("localhost", "cadastro", "123", "CADASTRO");
    if ($mysqli->connect_error) {
        die("Erro na conexão: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("SELECT email FROM cadastrados WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Este endereço de email já está cadastrado.<br>";
        $erro = true;
    }

    $stmt->close();

    if (!$erro) {
        // Criptografar a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Usar consultas preparadas para evitar injeção de SQL
        $stmt = $mysqli->prepare("INSERT INTO cadastrados (nome, email, senha, cpf, data_nascimento) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $email, $senhaHash, $cpf, $data_nascimento);

        if ($stmt->execute()) {
            echo "O usuário foi cadastrado com sucesso. Redirecionando para a página inicial...";
            header("Refresh: 1; URL=index.html"); // Redireciona após 1 segundo

        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }

        $stmt->close();
    }

    $mysqli->close();
}
?>
