<?php
$mensagemErro = ""; // Inicializa a mensagem de erro como uma string vazia

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    $genero = $_POST["genero"]; // Adiciona o campo de gênero
    
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

    // Validação do CPF
    if (empty($cpf) || !is_numeric($cpf) || strlen($cpf) != 14) {
      $mensagemErro .= "Preencha um CPF válido com exatamente 11 dígitos numéricos.<br>";
      $erro = true;
  }
  

    // Validação da data de nascimento (pode ser mais rigorosa)
    if (empty($data_nascimento) || !strtotime($data_nascimento)) {
        $mensagemErro .= "Preencha uma data de nascimento válida no formato YYYY-MM-DD.<br>";
        $erro = true;
    }

    // Validação do gênero
    if (empty($genero)) {
        $mensagemErro .= "Selecione seu gênero.<br>";
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
        $stmt = $mysqli->prepare("INSERT INTO cadastrados (nome, email, senha, cpf, data_nascimento, genero) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $email, $senhaHash, $cpf, $data_nascimento, $genero);
    
        if ($stmt->execute()) {
            $mysqli->close();
            header("Location: index.html"); // Redireciona para a página inicial após o cadastro bem-sucedido
            exit; // Certifique-se de sair do script após o redirecionamento
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
          width: 31rem;
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

      .login-button {
          display: flex;
          align-items: center;
      }

      .login-button button {
          border: none;
          background-color: #6c63ff;
          padding: 0.4rem 1rem;
          border-radius: 5px;
          cursor: pointer;
      }

      .login-button button:hover {
          background-color: #6b63fff1;
      }

      .login-button button a {
          text-decoration: none;
          font-weight: 500;
          color: #fff;
      }

      .form-header h1::after {
          content: '';
          display: block;
          width: 5rem;
          height: 0.3rem;
          background-color: #6c63ff;
          margin: 0 auto;
          position: absolute;
          border-radius: 10px;
      }

      .input-group {
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
          padding: 1rem 0;
      }

      .input-box {
          display: flex;
          flex-direction: column;
          margin-bottom: 1.1rem;
      }

      .input-box input {
          margin: 0.6rem 0;
          padding: 0.8rem 1.2rem;
          border: none;
          border-radius: 10px;
          box-shadow: 1px 1px 6px #0000001c;
          font-size: 0.8rem;
      }

      .input-box input:hover {
          background-color: #eeeeee75;
      }

      .input-box input:focus-visible {
          outline: 1px solid #6c63ff;
      }

      .input-box label,
      .gender-title h6 {
          font-size: 0.75rem;
          font-weight: 600;
          color: #000000c0;
      }

      .input-box input::placeholder {
          color: #000000be;
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
      }

      .continue-button button:hover {
          background-color: #6b63fff1;
      }

      .continue-button button a {
          text-decoration: none;
          font-size: 0.93rem;
          font-weight: 500;
          color: #fff;
      }

      @media screen and (max-width: 1330px) {
          .form-image {
              display: none;
          }
          .container {
              width: 50%;
          }
          .form {
              width: 100%;
          }
      }

      @media screen and (max-width: 1064px) {
          .container {
              width: 90%;
              height: auto;
          }
          .input-group {
              flex-direction: column;
              z-index: 5;
              padding-right: 5rem;
              max-height: 10rem;
              overflow-y: scroll;
              flex-wrap: nowrap;
          }
          .gender-inputs {
              margin-top: 2rem;
          }
          .gender-group {
              flex-direction: column;
          }
          .gender-title h6 {
              margin: 0;
          }
          .gender-input {
              margin-top: 0.5rem;
          }
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
            <form action="#" method="post">
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
                        <h6>Gênero</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="female" type="radio" name="gender" value="Feminino">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input id="male" type="radio" name="gender" value="Masculino">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input id="others" type="radio" name="gender" value="Outros">
                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <input id="none" type="radio" name="gender" value="Prefiro não dizer">
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





