<?php include "conecta_mysql.php";
 ?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=".css/editaemail.css"/>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body class="fadeIn">
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index_paciente.php"><img src=".img/logo.png" class="img-center" width="45%"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <p>Redefina seu Email!

            Apos redefinir voce sera encaminhado direto para a pagina de login
        </P>
        <form action="editaemail.php" method="POST" class="form-container">
          <input type="hidden" name="operacao" value="editemail">
		  	<?php
            session_start();
            
            include "conecta_mysql.php";
            
            $operacao = isset($_POST['operacao']) ? $_POST['operacao'] : '';
            
            if($operacao === "editemail") {
            
                if(isset($_SESSION["email"])) {
                    $email = $_SESSION["email"];
                    
                    $emailnovo = mysqli_real_escape_string($mysqli, $_POST['emailnovo']);
                    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);
                    
                    $stmt = $mysqli->prepare("SELECT senha FROM cliente WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        
                        if(password_verify($senha, $row['senha'])) {
                            
                            $stmt = $mysqli->prepare("SELECT email FROM cliente WHERE email = ? UNION SELECT email FROM funcionario WHERE email = ?");
                            $stmt->bind_param("ss", $emailnovo, $emailnovo);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            if($result->num_rows === 0) {

                                $stmt = $mysqli->prepare("UPDATE cliente SET email = ? WHERE email = ?");
                                $stmt->bind_param("ss", $emailnovo, $email);
                                $stmt->execute();
                                
                                if($stmt->affected_rows > 0) {
                                    header("Location: login.php"); 
                                    exit;
                                } else {
                                    echo "Não foi possível atualizar o email.";
                                }
                            } else {
                                echo "E-mail já cadastrado.";
                            }
                        } else {

                            echo "Senha incorreta!";
                        }
                    } else {

                        echo "E-mail não encontrado.";
                    }
                    
                    $stmt->close();
                }
            }
            

            ?>

          <p>Seu novo email<input type="email" placeholder="insira aqui" name="emailnovo"></p>
          <p>Insira sua senha atual <input type="password" placeholder="insira aqui" name="senha"></p>
          <p><input type="submit" value="Enviar" class="btn"></p>    
        </form>
    </div>
  </body>
</html>
