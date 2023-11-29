<?php
$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do agendamento
    $idServico = $_POST["idServico"];
    $idFuncionario = $_POST["idFuncionario"];
    $idCliente = $_POST["idCliente"];
    $dataConsulta = $_POST["dataConsulta"];
    $horarioConsulta = $_POST["horarioConsulta"];

    $erro = false;

    // Validações básicas
    if (empty($idServico) || empty($idFuncionario) || empty($idCliente)) {
        $mensagemErro .= "Todos os campos do agendamento são obrigatórios.<br>";
        $erro = true;
    }

    if (empty($dataConsulta) || !strtotime($dataConsulta)) {
        $mensagemErro .= "Preencha uma data de consulta válida no formato DD-MM-YYYY.<br>";
        $erro = true;
    }

    if (empty($horarioConsulta) || !preg_match("/^[0-2][0-9]:[0-5][0-9]$/", $horarioConsulta)) {
        $mensagemErro .= "Preencha um horário de consulta válido .<br>";
        $erro = true;
    }

    // Cria a conexão com o banco de dados
    $mysqli = new mysqli("localhost", "agendasaude", "123", "AGENDASAUDE");
    if ($mysqli->connect_error) {
        die("Erro na conexão: " . $mysqli->connect_error);
    }

    // Verifica se já existe um agendamento para o horário selecionado
    $stmt = $mysqli->prepare("SELECT idAgendamento FROM Agendamento WHERE idFuncionario = ? AND data_consulta = ? AND horario_consulta = ?");
    $stmt->bind_param("iss", $idFuncionario, $dataConsulta, $horarioConsulta);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $mensagemErro .= "Já existe um agendamento para este horário com o funcionário selecionado.<br>";
        $erro = true;
    }

    $stmt->close();

    if (!$erro) {
        // Insere o novo agendamento no banco de dados
        $stmt = $mysqli->prepare("INSERT INTO Agendamento (idServico, idFuncionario, idCliente, data_consulta, horario_consulta) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $idServico, $idFuncionario, $idCliente, $dataConsulta, $horarioConsulta);

        if ($stmt->execute()) {
            // Redireciona para uma página de confirmação ou outra página conforme necessário
            $stmt->close();
            $mysqli->close();
            header("Location: confirmacao.php"); // Não fiz a pagina de confirmação ainda
            exit;
        } else {
            $mensagemErro .= "Erro ao inserir o agendamento: " . $stmt->error;
        }

        $stmt->close();
    }

    $mysqli->close();
}

// Se houver mensagens de erro, elas serão exibidas na página
echo $mensagemErro;
?>


<!doctype html>
<html lang="pt-br">
<head>
    <title>Atendimentos | Agenda+Saúde</title>
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
                <a class="navbar-brand" href="index.php"><img src=".img/logo.png" class="img-center" width="25%"/></a>
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
                            <a class="nav-link" href="#rodape">Sobre</a>
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
            <label for="idServico" class="form-label">Serviço</label>
            <select class="form-select" id="idServico" name="idServico">
                <option selected>Escolha um serviço...</option>
                <option value="1">Ortopedia</option>
                <option value="2">Vacinação</option>
                <option value="3">Oftalmologia</option>
                <option value="4">Odontológico</option>
                <option value="5">Psicólogo</option>
                <option value="6">Ginecológico</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="idFuncionario" class="form-label">Funcionário</label>
            <select class="form-select" id="idFuncionario" name="idFuncionario">
                <option selected>Escolha um funcionário...</option>
            
                <option value="1">Dr. Carlos</option>
                
            </select>
        </div>
        
        <div class="mb-3">
            <label for="idCliente" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="idCliente" name="idCliente" placeholder="Seu ID de cliente">
        </div>

        
        <div class="mb-3">
            <label for="dataConsulta" class="form-label">Data da Consulta</label>
            <input type="date" class="form-control" id="dataConsulta" name="dataConsulta">
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

        <div class="mb-3">
            <label  class="form-label">Endereço</label>
            <select class="form-select" name="endereco">
                <option selectead>Locais dísponíveis...</option>
            
                <option value="1">Rua Manoel Reis, 15 - Duque de Caxias- Rj</option>
                
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Agendar</button>
    </form>
</div>

</body>
</html>
