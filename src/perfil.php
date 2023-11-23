<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MediShed</title>
    <link rel="stylesheet" href="" />
  </head>

  <body>

    <style background-attachment: fixed;></style>

      <header class="nav">
      <nav>
      <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index.php"><img src=".img/logo.png" class="img-center" width="45%"/></a>
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="atendimentos.php">Atendimentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="meus_agend.php">Meus Agendamentos</a>
                        </li>
             </nav>
      </header>
        <div class="">
            <h1>Dados do seu Perfil</h1>
            <form action="perfil.php" method="POST" class="form-container">
            <?php
                include "conecta_mysql.php";
                session_start();

                $_SESSION["email"];

                $sql = "SELECT * FROM cliente WHERE email = '{$_SESSION["email"]}';"; 
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                for($i = 0; $i < $linhas; $i++){
                    $cliente = mysqli_fetch_array($res);
                    echo "<strong>Dados pessoais:</strong><br>";
                    echo "Nome: ".$cliente["nome_cliente"]."<br>";
                    echo "E-mail: ".$cliente["email"]."<br>";
                    echo "Cpf: ".$cliente["cpf"]."<br";
        
                }
                

                $_SESSION["email"];

            ?>

            </form>
        </div>
</html>
