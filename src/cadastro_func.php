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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #0c0ce94d;
        }

        .container {
            width: 80%;
            height: 80vh;
            display: flex;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);
        }

        .form-image {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fde3a7d7;
            padding: 1rem;
        }

        .form-image img {
            width: 100%; /* Ajusta a imagem para preencher todo o espaço disponível */
            max-width: 100%; /* Garante que a imagem não ultrapasse o tamanho do contêiner */
            height: auto; /* Mantém a proporção da imagem */
        }

        .form {
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            padding: 3rem;
        }

        .form-header {
            margin-bottom: 3rem;
            display: flex;
            justify-content: space-between;
        }

        .title h1 {
            font-size: 2rem; /* Tamanho maior para o título */
        }

        .login-button button {
            border: none;
            background-color: #6c63ff;
            padding: 0.4rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Remova a sublinhado do link */
            color: #fff;
            font-weight: 500;
        }

        .login-button button:hover {
            background-color: #6b63fff1;
        }

        .input-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 1rem 0;
        }

        .input-box {
            flex: 1; /* Distribui uniformemente os campos de entrada */
            display: flex;
            flex-direction: column;
            margin-bottom: 1.1rem;
        }

        .input-box label {
            font-size: 0.9rem; /* Tamanho do rótulo aumentado */
            font-weight: 600;
            color: #000; /* Cor do texto do rótulo ajustada */
        }

        .input-box input,
        .input-box select {
            margin: 0.6rem 0;
            padding: 0.8rem 1.2rem;
            border: none;
            border-radius: 10px;
            box-shadow: 1px 1px 6px #0000001c;
            font-size: 0.8rem;
        }

        .input-box input:hover,
        .input-box select:hover {
            background-color: #eeeeee75;
        }

        .input-box input:focus-visible,
        .input-box select:focus-visible {
            outline: 1px solid #6c63ff;
        }

        .input-box input::placeholder {
            color: #000000be;
        }

        .gender-title h6 {
            font-size: 0.9rem; /* Tamanho do rótulo de gênero aumentado */
        }

        .gender-group {
            display: flex;
            justify-content: space-between;
            margin-top: 0.62rem;
            padding: 0 .5rem;
        }

        .gender-input {
            display: flex;
            align-items: center;
        }

        .gender-input input {
            margin-right: 0.35rem;
        }

        .gender-input label {
            font-size: 0.81rem;
            font-weight: 600;
            color: #000000c0;
        }

        .continue-button button {
            width: 100%;
            margin-top: 2.5rem;
            border: none;
            background-color: #6c63ff;
            padding: 0.62rem;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            font-size: 0.93rem;
            font-weight: 500;
        }

        .continue-button button:hover {
            background-color: #6b63fff1;
        }
    </style>
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="med.png" alt="">
        </div>
        <div class="form">
            <form action="cadastro_func.php" method="post">
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
