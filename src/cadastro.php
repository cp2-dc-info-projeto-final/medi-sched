<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $erro = 0; // Inicializar a variável $erro
    
    if (empty($nome) || strstr($nome, " ") === FALSE){
        echo "Preencha seu nome com sobrenome";
        $erro = 1;
    }

    if (strlen($email) < 8 || strstr($email, "@") === FALSE){
        echo "Preencha seu email com pelo menos 8 caracteres.<br>";
        $erro = 1;
    }

    if (empty($senha) || strlen($senha) < 8){
        echo "Preencha sua senha com pelo menos 8 caracteres.<br>";
        $erro = 1;
    }
    
    if ($erro == 0){
        $mysqli = mysqli_connect("localhost", "cadastro", "123", "CADASTRO");
        if (!$mysqli) {
            die("Erro na conexão: " . mysqli_connect_error());
        }
        
        $sql = "INSERT INTO cadastrados (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        if (!mysqli_query($mysqli, $sql)){
            echo "Erro ao inserir dados: " . mysqli_error($mysqli);
        } else {
            echo "<br>O usuário foi cadastrado com sucesso";
        }
        
        mysqli_close($mysqli);
    }
}
    





?>
