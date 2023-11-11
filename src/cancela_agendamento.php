<?php
$mysqli = "localhost";
$nome = "nome";
$usuario = "nome do usuário"; 
$senha = "senha"; 

try {
    $conn = new PDO("mysql:host=$mysqli;nome=$nome", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$appointment_name = 'Appointment Name Here';
$sql = "UPDATE agendamentos SET status = 'cancelled' WHERE name = :appointment_name";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':appointment_name', $appointment_name);

if ($stmt->execute()) {
    echo "Agendamento cancelado com sucesso";
} else {
    echo "Erro ao cancelar agendamento";
}
$conn = null;
?>
