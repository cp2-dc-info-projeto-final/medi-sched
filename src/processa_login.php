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
            header("location: index.html");
            
        } else {
            echo "Credenciais inválidas. Tente novamente.";
        }
    }
}

mysqli_close($mysqli);
?>
