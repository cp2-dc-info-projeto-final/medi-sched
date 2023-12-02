<?php
session_start();
include "conecta_mysql.php";

// Verifica se o usuário está logado e tem um ID de usuário
if (!isset($_SESSION['email']) || !isset($_SESSION['idUsuario'])) {
    header('Location: login.php');
    exit;
}

$mensagemErro = "";
$idCliente = $_SESSION['idUsuario']; // Usaremos o ID do usuário como ID do cliente para o agendamento

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idFuncionario = $_POST["idFuncionario"];
    $dataConsulta = $_POST["dataConsulta"];
    $horarioConsulta = $_POST["horarioConsulta"];
    
    $erro = false;
    
    // Validações básicas
    if (empty($idFuncionario)) {
        $mensagemErro .= "Por favor, selecione um funcionário.<br>";
        $erro = true;
    }

    if (empty($dataConsulta) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $dataConsulta)) {
        $mensagemErro .= "Preencha uma data de consulta válida no formato AAAA-MM-DD.<br>";
        $erro = true;
    } else if (strtotime($dataConsulta) < strtotime(date("Y-m-d"))) {
        $mensagemErro .= "Não é possível selecionar uma data no passado.<br>";
        $erro = true;
    }

    if (empty($horarioConsulta) || !preg_match("/^[0-2][0-9]:[0-5][0-9]$/", $horarioConsulta)) {
        $mensagemErro .= "Preencha um horário de consulta válido.<br>";
        $erro = true;
    }

    // Verifica se já existe um agendamento para o horário selecionado
    if (!$erro) {
        $stmt = $mysqli->prepare("SELECT idAgendamento FROM Agendamento WHERE idFuncionario = ? AND data_consulta = ? AND horario_consulta = ?");
        $stmt->bind_param("iss", $idFuncionario, $dataConsulta, $horarioConsulta);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $mensagemErro .= "Já existe um agendamento para este horário com o funcionário selecionado.<br>";
            $erro = true;
        }
        $stmt->close();
    }

    // Insere o novo agendamento no banco de dados
    if (!$erro) {
        $stmt = $mysqli->prepare("INSERT INTO Agendamento (idFuncionario, idCliente, data_consulta, horario_consulta) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $idFuncionario, $idCliente, $dataConsulta, $horarioConsulta);

        if ($stmt->execute()) {
            header("Location: confirmacao.php");
            exit;
        } else {
            $mensagemErro .= "Erro ao inserir o agendamento: " . $stmt->error;
        }
        $stmt->close();
    }
}

// Reabrindo a conexão para buscar os funcionários
$mysqli = new mysqli("localhost", "agendasaude", "123", "AGENDASAUDE");

if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Consulta para obter os funcionários
$sqlFuncionarios = "SELECT idFuncionario, nome_funcionario, sobrenome_funcionario, area FROM Funcionario";
$resultadoFuncionarios = $mysqli->query($sqlFuncionarios);
$funcionarios = [];

if ($resultadoFuncionarios) {
    while ($row = $resultadoFuncionarios->fetch_assoc()) {
        $funcionarios[] = $row;
    }
}

$mysqli->close();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Agendamentos | Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=".css/agenda.css"/>
</head>
<body class="fadeIn">
    <div id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href="index_paciente.php"><img src=".img/logo.png" class="img-center" width="25%"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index_paciente.php">Início</a>
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

    <div class="container mt-5">
        <h2 class="mb-4">Agendar Consulta</h2>
        <!-- Mensagem de erro, se houver -->
        <?php if(!empty($mensagemErro)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $mensagemErro; ?>
            </div>
        <?php endif; ?>
        <form action="agendamento.php" method="post">
            <div class="mb-3">
                <label for="idFuncionario" class="form-label">Médico / Área Específica</label>
                <select class="form-select" id="idFuncionario" name="idFuncionario" required>
                    <option selected>Escolha um médico...</option>
                    <?php foreach ($funcionarios as $funcionario): ?>
                        <option value="<?php echo $funcionario['idFuncionario']; ?>">
                            <?php echo htmlspecialchars($funcionario['nome_funcionario'] . ' / ' . $funcionario['area']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="dataConsulta" class="form-label">Data da Consulta</label>
                <input type="date" class="form-control" id="dataConsulta" name="dataConsulta" required>
            </div>
            
            <div class="mb-3">
                <label for="horarioConsulta" class="form-label">Horário da Consulta</label>
                <select class="form-control" id="horarioConsulta" name="horarioConsulta">
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>
    </div>

</body>
</html>
