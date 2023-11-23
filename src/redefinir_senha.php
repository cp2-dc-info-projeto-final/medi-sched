<?php
include "autentica.php"; 
include "conecta_mysqli.php"; 

$idCliente = $_GET["idCliente"]; 
$sql = "SELECT * FROM Cliente WHERE idCliente = ?;";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $idCliente);
$stmt->execute();
$result = $stmt->get_result();
$cliente = $result->fetch_assoc();
?>

<html>
<head>
    <title>Alteração de senha</title>
    <meta charset="UTF-8">
</head>
<body>

    <?php
        if(isset($_SESSION["erro_senha"])){
            echo $_SESSION["erro_senha"];
            unset($_SESSION["erro_senha"]);
        }
    ?>

    <p><strong>Alterar senha:</strong></p>
    <form action="recebe_dados.php" method="POST">
        <input type="hidden" name="operacao" value="alterar_senha">
        <input type="hidden" name="idCliente" value="<?php echo $cliente['idCliente'] ?>">            
        <p>
            Senha atual: <input type="password" name="senha_atual" 
            size="10" placeholder="Digite a senha atual">
        </p>
        <p>
            Senha nova: <input type="password" name="senha_nova" 
            size="10" placeholder="Digite uma nova senha">
        </p>
        <p>
            Repita a senha nova: <input type="password" name="senha_rep" 
            size="30" placeholder="Digite novamente a senha nova">
        </p>
        <p><input type="submit" value="Enviar"></p>
    </form>
  
</body>
</html>
