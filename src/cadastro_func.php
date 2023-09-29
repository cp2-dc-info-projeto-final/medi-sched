<?php
$mensagemErro = ""; // Inicializa a mensagem de erro como uma string vazia

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $primeiro_nome = $_POST["firstname"];
    $sobrenome = $_POST["lastname"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["dataNascimento"];
    $genero = $_POST["gender"];
    $cargo = $_POST["cargo"];
    
    $erro = false; // Inicializar a variável $erro

    // Validação do nome completo
    if (empty($primeiro_nome) || empty($sobrenome)) {
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

    // Validação do CPF
    if (empty($cpf) || strlen($cpf) != 14) {
        $mensagemErro .= "Preencha um CPF válido com exatamente 11 dígitos numéricos.<br>";
        $erro = true;
    }

    // Validação da data de nascimento
    if (empty($data_nascimento) || !strtotime($data_nascimento)) {
        $mensagemErro .= "Preencha uma data de nascimento válida no formato YYYY-MM-DD.<br>";
        $erro = true;
    }

    // Validação do gênero
    if (empty($genero)) {
        $mensagemErro .= "Selecione seu gênero.<br>";
        $erro = true;
    }

    // Validação do cargo
    if (empty($cargo)) {
        $mensagemErro .= "Selecione seu cargo.<br>";
        $erro = true;
    }

    if (!$erro) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    
        $stmt = $mysqli->prepare("INSERT INTO funcionario (nome_funcionario, sobrenome_funcionario, email, senha, cpf, data_nascimento, cargo, genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $primeiro_nome, $sobrenome, $email, $senhaHash, $cpf, $data_nascimento, $genero);
    
        if ($stmt->execute()) {
            $mysqli->close();
            header("Location: index.html");
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
    <link rel="stylesheet" href="style2.css">

    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="med.png" alt="">
        </div>
        <div class="form">
            <form action="cadastro_func" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="#">Entrar</a></button>
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
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>


                    <div class="input-box">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input id="dataNascimento" type="date" name="dataNascimento" required>
                    </div>

                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                    <label for="cargo">Cargo:</label>
                        <select id="cargo" name="cargo" required>
                            <option value="Cirurgião">Cirurgião</option>
                            <option value="Enfermeiro">Enfermeiro</option>
                            <option value="Ortopedista">Ortopedista</option>
                            <option value="Dermatologista">Dermatologista</option>
                            <option value="Dentista">Dentista</option>
                        </select>
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
