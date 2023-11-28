<?php include "conecta_mysql.php";
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<!DOCTYPE html>
 <html lang="pt-br"> 
        <head> 
        <meta charset="UTF-8" /> 
        <meta name="viewport" content="width=device-width, initial-scale=1" />
         <title>Agenda+Saúde</title>
          <link rel="stylesheet" href="" />
         </head> <body> <body class="fadeIn"> 
            <div id="header"> <div class="container">
                 <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                     <a class="navbar-brand" href="index.php">
                        <img src=".img/logo.png" class="img-center" width="45%"/>
                    </a> <div class="collapse navbar-collapse" id="nav-content"> 
                        <ul class="navbar-nav"> <li class="nav-item"> 
                            <a class="nav-link active" aria-current="page" href="index_paciente.php">Início</a> 
                        </li> <li class="nav-item"> <a class="nav-link" href="atendimentos.php">Atendimentos</a>
                     </li> <li class="nav-item"> <a class="nav-link" href="meus_agend.php">Meus Agendamentos</a> 
                    </li>
                 </ul> 
                </div> 
            </nav>
         </div>

    <div class="container">
        <p>Redefina seu Email!
            Apos redefinir voce sera encaminhado direto para a pagina de login
        </p>
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

          <p>Seu novo email<input type="text" placeholder="insira aqui" name="emailnovo"></p>
          <p>Insira sua senha atual <input type="password" placeholder="insira aqui" name="senha"></p>
          <p><input type="submit" value="Enviar" class="btn"></p>    
        </form>
    </div>
  </body>
</html> 
