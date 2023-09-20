<?php
$mensagemErro = ""; // Inicializa a mensagem de erro como uma string vazia

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    
    $erro = false; // Inicializar a variável $erro

    // Validação do nome
    if (empty($nome) || strpos($nome, " ") === false) {
        $mensagemErro .= "Preencha seu nome completo com sobrenome.<br>";
        $erro = true;
    }

    // Validação do email
    if (strlen($email) < 8 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagemErro .= "Preencha um email válido com pelo menos 8 caracteres.<br>";
        $erro = true;
    }

    // Validação da senha
    if (strlen($senha) < 8) {
        $mensagemErro .= "A senha deve ter pelo menos 8 caracteres.<br>";
        $erro = true;
    }

    // Validação do CPF (pode ser mais rigorosa)
    if (empty($cpf) || !is_numeric($cpf) || strlen($cpf) != 11) {
        $mensagemErro .= "Preencha um CPF válido com 11 dígitos numéricos.<br>";
        $erro = true;
    }

    // Validação da data de nascimento (pode ser mais rigorosa)
    if (empty($data_nascimento) || !strtotime($data_nascimento)) {
        $mensagemErro .= "Preencha uma data de nascimento válida no formato YYYY-MM-DD.<br>";
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
        $mensagemErro .= "Este endereço de email já está cadastrado.<br>";
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
            header("Location: index.html"); // Redireciona para a página inicial após o cadastro bem-sucedido
            exit;
        } else {
            $mensagemErro .= "Erro ao inserir dados: " . $stmt->error;
        }

        $stmt->close();
    }

    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Página de Cadastro</title>
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
            
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
            
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required placeholder="Digite seu CPF">

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
            
            <button type="submit">Cadastrar</button>
        </form>

        <p>É um profissional? <a href="cadastro_func.html">Cadastrar-se</a>.</p>
        <p>Já tem uma conta? <a href="login.html">Fazer login</a>.</p>
        <div id="mensagemErro"><?php echo $mensagemErro; ?></div>
    </div>
</body>
</html>
