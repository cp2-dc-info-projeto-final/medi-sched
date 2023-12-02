<?php
$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Dados do formulário
    $primeiro_nome = $_POST["firstname"];
    $sobrenome = $_POST["lastname"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["dataNascimento"];
    $genero = $_POST["genero"];
    
    $erro = false;

    // Validações
    if (empty($primeiro_nome) || empty($sobrenome)) {
        $mensagemErro .= "Preencha seu nome completo com sobrenome.<br>";
        $erro = true;
    }

    if (strlen($email) < 8 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagemErro .= "Preencha um email válido com pelo menos 8 caracteres.<br>";
        $erro = true;
    }

    if (strlen($senha) < 8) {
        $mensagemErro .= "A senha deve ter pelo menos 8 caracteres.<br>";
        $erro = true;
    }

    if (empty($cpf) || strlen($cpf) != 14) {
        $mensagemErro .= "Preencha um CPF válido com exatamente 11 dígitos numéricos.<br>";
        $erro = true;
    }
    
    if (empty($data_nascimento) || !strtotime($data_nascimento)) {
        $mensagemErro .= "Preencha uma data de nascimento válida.<br>";
        $erro = true;
    }

    if (empty($genero)) {
        $mensagemErro .= "Selecione seu gênero.<br>";
        $erro = true;
    }

    // Conexão com o banco de dados
    $mysqli = new mysqli("localhost", "agendasaude", "123", "AGENDASAUDE");
    if ($mysqli->connect_error) {
        die("Erro na conexão: " . $mysqli->connect_error);
    }

    // Verifica se o email já está cadastrado como cliente
    $stmt = $mysqli->prepare("SELECT email FROM cliente WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $mensagemErro .= "Este endereço de email já está cadastrado como cliente.<br>";
        $erro = true;
    }
    $stmt->close();

    // Verifica se o email já está cadastrado como funcionário
    $stmt = $mysqli->prepare("SELECT email FROM funcionario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $mensagemErro .= "Este endereço de email já está cadastrado como funcionário.<br>";
        $erro = true;
    }
    $stmt->close();

    // Verifica se o email já está cadastrado como administrador
    $stmt = $mysqli->prepare("SELECT email FROM administrador WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $mensagemErro .= "Este endereço de email já está cadastrado como administrador.<br>";
        $erro = true;
    }
    $stmt->close();

    // Exibe mensagens de erro, se houver
    echo $mensagemErro;

    // Se não houver erro, procede com o cadastro
    if (!$erro) { 
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    
        $stmt = $mysqli->prepare("INSERT INTO cliente (nome_cliente, sobrenome_cliente, email, senha, cpf, data_nascimento, genero) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $primeiro_nome, $sobrenome, $email, $senhaHash, $cpf, $data_nascimento, $genero);
    
        if ($stmt->execute()) {
            $mysqli->close();
            header("Location: login.php");
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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css/cad_log.css">

    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src=".img/med.png" alt="">
        </div>
        <div class="form">
            <form action="cadastro.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="login.php">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome</label>
                        <input id="firstname" type="text" name="firstname" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <div class="input-box">
                        <label for="lastname">Sobrenome</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="000.000.000-00" 
                              oninput="formatarCPF(this);" maxlength="14" required>
                    </div>



                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>


                    <div class="input-box">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input id="dataNascimento" type="date" name="dataNascimento" required>
                    </div>

                </div>

                <div class="genero-inputs">
                    <div class="genero-title">
                        <h6>Gênero</h6>
                    </div>

                    <div class="genero-group">
                        <div class="genero-input">
                            <input id="female" type="radio" name="genero" value="Feminino">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="genero-input">
                            <input id="male" type="radio" name="genero" value="Masculino">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="genero-input">
                            <input id="others" type="radio" name="genero" value="Outros">
                            <label for="others">Outros</label>
                        </div>

                        <div class="genero-input">
                            <input id="none" type="radio" name="genero" value="Prefiro não dizer">
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit">Continuar</button>
                </div>
            </form>
            <script>
                function formatarCPF(campo) {
                    campo.value = campo.value.replace(/\D/g, ''); // Remove tudo que não é dígito
                    campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca o ponto após o terceiro dígito
                    campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca o segundo ponto após o sexto dígito
                    campo.value = campo.value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Coloca o traço após o nono dígito
                }
            </script>
        </div>
    </div>
</body>

</html>



