INCOMPLETO

<?php

include "autentica.php";
include "conecta_mysql.inc";
include "envia_email.php";


$idAgendamento = $_REQUEST['idAgendamento'];

$sql = "select * from Agendamento where idAgendamento = $idAgendamento";
$res = mysqli_query($mysqli, $sql);
$var = mysqli_fetch_array($res);

$nomeFuncionario = utf8_encode($var["  nomeFuncionario"]);
$nomeCliente = utf8_encode($var["nomeCliente"]);

$servico = utf8_encode($var["servico"]);
$data_consulta = date('d/m/Y', strtotime($var["data_consulta"]));
$horario_consulta = $var["horario_consulta"];

$idCliente = $var["idCliente"];
$idFuncionario = $var["idFuncionario"];

$sql = "select * from cliente where idCliente = 'idCliente'";
$res = mysqli_query($mysqli, $sql);
$cliente = mysqli_fetch_array($res);

$email_cliente = $cliente["email"];

$sql = "select * from funcionario where idCliente = 'idCliente'";
$res= mysqli_query($mysqli,$sql);
$funcionario= mysqli_fetch_array($res);
$email_funcionario = $funcionario["email"];

#Enviar email

$para = $email_cliente;
$assunto = utf8_decode("Agendamento cancelado!");
$mensagem = utf8_decode("<h2><u>Olá $nomeCliente!</u></h2> <br> <small>Cliente </small> <br> <h3>O serviço de <b>$servico</b> no dia <b>$data_consulta</b> às <b>$horario_consulta</b> com o (a) funcionário (a) <b>$nomeFuncionario</b> foi cancelado com sucesso.</h3> <br> ");
envia_email($para, $assunto, $mensagem);

$para = $email_funcionario;
$assunto = utf8_decode("Agendamento cancelado!");
$mensagem = utf8_decode("<h2><u>Olá $nomeFuncionario!</u></h2> <br> <small>Funcionário</small> <br> <h3>O serviço de <b>$servico</b> no dia <b>$data_consulta</b> às <b>$horario_consulta</b> foi cancelado pelo cliente <b>$nomeCliente</b>.</h3> <br> ");
envia_email($para, $assunto, $mensagem);


$sql = "UPDATE Agendamento SET idCliente = NULL, nomeCliente = NULL WHERE idAgendamento = '$idAgendamento'";
$res= mysqli_query($mysqli,$sql);

$_SESSION['mensagem_agendamento'] = "<div class='alert alert-success'>Agendamento cancelado!</div>";

mysqli_close($mysqli);
?>
