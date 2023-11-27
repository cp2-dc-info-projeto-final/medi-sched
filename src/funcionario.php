<?php
include "conecta_mysql.php"; // Conecta ao banco de dados

$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $primeiro_nome = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
    $sobrenome = isset($_POST["lastname"]) ? $_POST["lastname"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : '';
    $cpf = isset($_POST["cpf"]) ? $_POST["cpf"] : '';
    $data_nascimento = isset($_POST["dataNascimento"]) ? $_POST["dataNascimento"] : '';
    $genero = isset($_POST["genero"]) ? $_POST["genero"] : '';
    $area = isset($_POST["areasMedicas"]) ? $_POST["areasMedicas"] : '';


    // Verificação de email duplicado
    $stmt = $mysqli->prepare("SELECT email FROM Funcionario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $mensagemErro .= "Este endereço de email já está cadastrado.<br>";
    } else {
        $stmt->close();
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("INSERT INTO Funcionario (nome_funcionario, sobrenome_funcionario, email, senha, cpf, data_nascimento, area, genero) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $primeiro_nome, $sobrenome, $email, $senhaHash, $cpf, $data_nascimento, $area, $genero);

        if ($stmt->execute()) {
            header("Location: index.php"); // Redirecionamento para a página de confirmação ou de login do funcionário
            exit;
        } else {
            $mensagemErro .= "Erro ao inserir dados: " . $stmt->error;
        }
        $stmt->close();
    }
    $mysqli->close();
}

if ($mensagemErro) {
    echo "<div class='alert alert-danger'>$mensagemErro</div>";
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css/funcionario.css">
    <title> Agenda+Saúde /Cadastro de Funcionário </title>
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src=".img/med.png" alt="">
        </div>
        <div class="form">
            <form action="funcionario.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro de Funcionário</h1>
                    </div>
                    <div class="login-button">
                        <button type="button" onclick="location.href='login.php'">Entrar</button>
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
                        <input id="cpf" type="text" name="cpf" placeholder="000.000.000-00" oninput="formatarCPF(this);" maxlength="14" required>
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input id="dataNascimento" type="date" name="dataNascimento" required>
                    </div>

                    <div class="input-box">
                        <label for="areasMedicas">Área Médica</label>
                        <select id="areasMedicas" name="areasMedicas" required>
                            <option value="Ortopedia">Ortopedia</option>
                            <option value="Enfermagem">Enfermagem</option>
                            <option value="Oftalmologia">Oftalmologia</option>
                            <option value="Odontologia">Odontologia</option>
                            <option value="Psicologia">Psicologia</option>
                            <option value="Ginecologia">Ginecologia</option>
                        </select>
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
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function formatarCPF(campo) {
            campo.value = campo.value.replace(/\D/g, ''); // Remove tudo que não é dígito
            campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca ponto após o terceiro dígito
            campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca ponto após o sexto dígito
            campo.value = campo.value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Coloca traço após o nono dígito
        }
    </script>
</body>
</html>

