<?php
$mysqli = mysqli_connect("localhost", "cadastro", "123", "CADASTRO");
if (!$mysqli) {
    die("Erro na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM cadastrados WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($mysqli, $sql);

    if (!$result) {
        echo "Erro na consulta: " . mysqli_error($mysqli);
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Login bem-sucedido, redirecionar para a página inicial
            header("location: index.html");
            exit; // Certifique-se de sair do script após o redirecionamento
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    }
}

mysqli_close($mysqli);
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

      .input-box label {
          font-size: 0.75rem;
          font-weight: 600;
          color: #000000c0;
      }

      .input-box input::placeholder {
          color: #000000be;
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
      }
    </style>
    <title>Login</title>
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
                        <h1>Login</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="cadastro.php">Cadastre-se</a></button>
                    </div>
                </div>

                <div class="input-box">
                    <label for="email">E-mail</label>
                    <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                </div>

                <div class="input-box">
                    <label for="senha">Senha</label>
                    <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="continue-button">
                    <button type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
