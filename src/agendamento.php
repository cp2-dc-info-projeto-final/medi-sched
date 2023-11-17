<?php
$mensagemErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idServico = $_POST["idServico"];
    $idFuncionario = $_POST["idFuncionario"];
    $nomeCliente = $_POST["nomeCliente"];
    $sobrenomeCliente = $_POST["sobrenomeCliente"];
    $dataConsulta = $_POST["dataConsulta"];
    $horarioConsulta = $_POST["horarioConsulta"];

    $erro = false;

    if (empty($idServico) || empty($idFuncionario) || empty($nomeCliente) || empty($sobrenomeCliente)) {
        $mensagemErro .= "Todos os campos do agendamento são obrigatórios.<br>";
        $erro = true;
    }

    if (empty($dataConsulta) || !strtotime($dataConsulta)) {
        $mensagemErro .= "Preencha uma data de consulta válida.<br>";
        $erro = true;
    }

    if (empty($horarioConsulta) || !preg_match("/^(10|11|12|13|14|15|16|17|18):[0-5][0-9]$/", $horarioConsulta)) {
        $mensagemErro .= "Preencha um horário de consulta válido entre 10:00 e 18:00.<br>";
        $erro = true;
    }

    $mysqli = new mysqli("localhost", "agendasaude", "123", "AGENDASAUDE");
    if ($mysqli->connect_error) {
        die("Erro na conexão: " . $mysqli->connect_error);
    }

    if (!$erro) {
        $stmt = $mysqli->prepare("INSERT INTO Agendamento (idServico, idFuncionario, nomeCliente, sobrenomeCliente, data_consulta, horario_consulta) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissss", $idServico, $idFuncionario, $nomeCliente, $sobrenomeCliente, $dataConsulta, $horarioConsulta);

        if ($stmt->execute()) {
            header("Location: confirmacao.php");
            exit;
        } else {
            $mensagemErro .= "Erro ao inserir o agendamento: " . $stmt->error;
        }

        $stmt->close();
    }

    $mysqli->close();
}

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
                <a class="navbar-brand" href="index.php"><img src=".img/logo.png" class="img-center" width="45%"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav-content">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="atendimentos.php">Atendimentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#rodape">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="meus_agend.php">Meus Agendamentos</a>
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
                <option value="1">Consulta Geral</option>
                <option value="2">Vacinação</option>
                <option value="3">Check-up Anual</option>
                <option value="4">Gerenciamento de Doenças Crônicas</option>
                <option value="5">Serviços de Saúde Mental</option>
                <option value="6">Saúde da Mulher</option>
                <option value="7">Atendimento de Urgência</option>
                <option value="8">Exame de Rotina</option>
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
            <label for="nomeCliente" class="form-label">Nome do Cliente</label>
            <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" placeholder="Digite seu nome">
        </div>
        <div class="mb-3">
            <label for="sobrenomeCliente" class="form-label">Sobrenome do Cliente</label>
            <input type="text" class="form-control" id="sobrenomeCliente" name="sobrenomeCliente" placeholder="Digite seu sobrenome">
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

        
        <button type="submit" class="btn btn-primary">Agendar</button>
    </form>
</div>

</body>
</html>
