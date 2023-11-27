<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agenda+Saúde</title>
    <link rel="stylesheet" href="" />
  </head>

<body class="fadeIn">
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index.php"><img src=".img/logo.png" class="img-center" width="45%"/></a>
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index_paciente.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="atendimentos.php">Atendimentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="meus_agend.php">Meus Agendamentos</a>
                        </li>
                    </ul>
               </div>
            </nav>
        </div>
    </div id="slider">
        <div class="container">
            <h1>Dados do seu Perfil</h1>
            <form action="perfil_func.php" method="POST" class="form-container">
            <?php
                include "conecta_mysql.php";
                session_start();

                $_SESSION["email"];

                $sql = "SELECT * FROM funcionario WHERE email = '{$_SESSION["email"]}';"; 
                $res = mysqli_query($mysqli,$sql);
                $linhas = mysqli_num_rows($res);
                for($i = 0; $i < $linhas; $i++){
                    $funcionario = mysqli_fetch_array($res);
                    echo "<strong>Dados pessoais:</strong><br>";
                    echo "Id Funcionario: ".$funcionario["idFuncionario"]."<br>";
                    echo "Nome: ".$funcionario["nome_funcionario"]."<br>";
                    echo "E-mail: ".$funcionario["email"]."<br>";
                    echo "Area: ".$funcionario["area"]."<br";
        
                }
            ?>

            </form>
        </div>
</html>
