<?php
session_start();
include "conecta_mysql.php";

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

$email = $_SESSION['email'];
$agendamentos = array();

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT idCliente FROM Cliente WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$idCliente = null;
if ($row = $result->fetch_assoc()) {
    $idCliente = $row['idCliente'];
}
$stmt->close();

if ($idCliente !== null) {
    $stmt = $mysqli->prepare("SELECT idAgendamento, idServico, idFuncionario, data_consulta, horario_consulta FROM Agendamento WHERE idCliente = ?");
    $stmt->bind_param("i", $idCliente);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $agendamentos[] = $row;
        }
    } else {
        echo "<p></p>";
    }
    $stmt->close();
}

$mysqli->close();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Seu HTML e meta tags aqui -->
    <title>Meus Agendamentos | Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <link rel="stylesheet" href=".css/mostrar.css"/>
</head>
<body class="fadeIn">
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index_func.php"><img src=".img/logo.png" class="img-center" width="45%"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index_paciente.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil_func.php">Perfil</a>
                        </li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container mt-5">
        <h2>Meus Agendamentos</h2>
        <?php if (count($agendamentos) > 0): ?>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID do Agendamento</th>
                        <th>ID do Serviço</th>
                        <th>ID do Funcionário</th>
                        <th>Data da Consulta</th>
                        <th>Horário da Consulta</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentos as $agendamento): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($agendamento['idAgendamento']); ?></td>
                            <td><?php echo htmlspecialchars($agendamento['idServico']); ?></td>
                            <td><?php echo htmlspecialchars($agendamento['idFuncionario']); ?></td>
                            <td><?php echo htmlspecialchars($agendamento['data_consulta']); ?></td>
                            <td><?php echo htmlspecialchars($agendamento['horario_consulta']); ?></td>
                            <td>
                                <a href="cancela_agendamento.php?idAgendamento=<?php echo $agendamento['idAgendamento']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja cancelar este agendamento?');">Cancelar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você não tem agendamentos marcados.</p>
        <?php endif; ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>   
</body>
</html>
    
