<?php
$mensagemErro = ""; // Inicializa a mensagem de erro como uma string vazia

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];
    $data_nascimento = $_POST["data_nascimento"];
    
    $erro = false; // Inicializar a variável $erro

    // Validação do nome
    if (empty($nome) || strpos($nome, " ") === false) {
        $mensagemErro .= "Preencha seu nome completo com sobrenome.<br>";
        $erro = true;
    }

    // Validação do email
    if (strlen($email) < 8 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensagemErro .= "Preencha um email válido com pelo menos 8 caracteres.<br>";
        $erro = true;
    }

    // Validação da senha
    if (strlen($senha) < 8) {
        $mensagemErro .= "A senha deve ter pelo menos 8 caracteres.<br>";
        $erro = true;
    }

    // Validação do CPF
    if (empty($cpf) || !is_numeric($cpf) || strlen($cpf) != 14) {
        $mensagemErro .= "Preencha um CPF válido com exatamente 11 dígitos numéricos.<br>";
        $erro = true;
    }

    // Validação da data de nascimento (pode ser mais rigorosa)
    if (empty($data_nascimento) || !strtotime($data_nascimento)) {
        $mensagemErro .= "Preencha uma data de nascimento válida no formato YYYY-MM-DD.<br>";
        $erro = true;
    }

    
    // Verificar se o email já está cadastrado
    $mysqli = new mysqli("localhost", "cadastro", "123", "CADASTRO");
    if ($mysqli->connect_error) {
        die("Erro na conexão: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("SELECT email FROM cliente WHERE email = ?");
    if (!$stmt) {
        die("Erro na consulta: " . $mysqli->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $mensagemErro .= "Este endereço de email já está cadastrado.<br>";
        $erro = true;
    }

    $stmt->close();




    if (!$erro) {
        // Criptografar a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    
        // Usar consultas preparadas para evitar injeção de SQL
        $stmt = $mysqli->prepare("INSERT INTO cliente (nome, email, senha, cpf, data_nascimento) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $email, $senhaHash, $cpf, $data_nascimento);
    
        if ($stmt->execute()) {
            $mysqli->close();
            header("Location: index.html"); // Redireciona para a página inicial após o cadastro bem-sucedido
            exit; // Certifique-se de sair do script após o redirecionamento
        } else {
            $mensagemErro .= "Erro ao inserir dados: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Webleb</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/css/styles.css">
  <style>
    
    @import url(https://fonts.googleapis.com/css?family=Poppins:300);
    *,
    *:before,
    *:after {
      box-sizing: border-box;
    }
    body {
      height: 100vh;
      background: #01939c;
      overflow-y: hidden!important;
      font-family: 'Poppins', sans-serif;
    }
    a {
      text-decoration: none;
      color: #01939c;
      transition: 0.5s ease;
    }
    a:hover {
      color: #179b77;
    }
    .form {
      background: #12141d;
      padding: 40px;
      max-width: 600px;
      margin: 40px auto;
      border-radius: 15px;
      box-shadow: 0 4px 10px 4px rgba(19, 35, 47, .3);
    }
    .tab-group {
      list-style: none;
      padding: 0;
      margin: 0 0 40px 0;
    }
    .tab-group:after {
      content: "";
      display: table;
      clear: both;
    }
    .tab-group li a {
      display: block;
      text-decoration: none;
      padding: 15px;
      background: rgba(160, 179, 176, .25);
      color: #a0b3b0;
      font-size: 20px;
      float: left;
      width: 48%;
      text-align: center;
      cursor: pointer;
      transition: 0.5s ease;
    }
    .tab-group li a:hover {
      background: #01939c;
      color: #fff;
    }
    .tab-group .active a {
      background: #01939c;
      color: #fff;
    }
    .tab-content > div:last-child {
      display: none;
    }
    .tab-group {
      border-radius: 15px!important;
      margin: 20px;
    }
    h1 {
      text-align: center;
      color: #fff;
      font-weight: 300;
      margin: 0 0 40px;
    }
    input,
    textarea {
      font-size: 17px;
      display: block;
      width: 100%;
      height: 100%;
      padding: 5px 10px;
      background: none;
      background-image: none;
      border: 1px solid #01939c;
      color: #fff;
      border-radius: 6px;
      transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }
    textarea {
      border: 2px solid #01939c;
      resize: vertical;
    }
    .field-wrap {
      position: relative;
      margin-bottom: 40px;
    }
    .top-row:after {
      content: "";
      display: table;
      clear: both;
    }
    .top-row > div {
      float: left;
      width: 48%;
      margin-right: 4%;
    }
    .top-row > div:last-child {
      margin: 0;
    }
    .button {
      border: 0;
      outline: none;
      border-radius: 15px;
      padding: 15px 0;
      font-size: 20px;
      font-weight: 400;
      letter-spacing: 0.1em;
      background: #01939c;
      cursor: pointer;
      color: #fff;
      transition: all 0.5s ease;
      -webkit-appearance: none;
    }
    .button:hover,
    .button:focus {
      background: #025c61;
    }
    .button-block {
      display: block;
      width: 100%;
    }
    .forgot {
      margin-top: -20px;
      text-align: right;
    }
  </style>
</head>
<body>
  <div class="form">
    <ul class="tab-group">
      <li class="tab active"><a href="#signup" style="border-radius: 15px!important;margin-right:8x;">Sign Up</a></li>
      <li class="tab"><a href="#login" style="border-radius: 15px!important;margin-left:8px;">Log In</a></li>
    </ul>
    <div class="tab-content">
      <div id="signup">
        <h1>Registro</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="field-wrap">
            <input type="text" required placeholder="Nome" name="nome">
          </div>
          <div class="field-wrap">
            <input type="email" required placeholder="Email" name="email">
          </div>
          <div class="field-wrap">
            <input type="password" required placeholder="Senha" name="senha">
          </div>
          <div class="field-wrap">
            <input type="text" required placeholder="CPF" name="cpf" maxlength="14" oninput="formatarCPF(this)">
          </div>
          <div class="field-wrap">
            <input type="date" required placeholder="Data de nascimento" name="data_nascimento">
          </div>
          <button type="submit" class="button button-block">Cadastrar</button>
        </form>
      </div>
      <div id="login">
        <h1>Welcome Back!</h1>
        <form action="processa_login.php" method="post"> 
          <div class="field-wrap">
            <input type="email" required placeholder="Email" name="login_email">
          </div>
          <div class="field-wrap">
            <input type="password" required placeholder="Password" name="login_senha">
          </div>
          <p class="forgot"><a href="">Forgot Password?</a></p>
          <button type="submit" class="button button-block" name="login_submit">Login</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/js/main.js"></script>

  <script>
    function formatarCPF(campo) {
      campo.value = campo.value.replace(/\D/g, ''); // Remove tudo que não é dígito
      campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca o ponto após o terceiro dígito
      campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2'); // Coloca o segundo ponto após o sexto dígito
      campo.value = campo.value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Coloca o traço após o nono dígito
    }
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
    var $this = $(this),
        label = $this.prev('label');

        if (e.type === 'keyup') {
                if ($this.val() === '') {
            label.removeClass('active highlight');
            } else {
            label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if( $this.val() === '' ) {
                label.removeClass('active highlight'); 
                } else {
                label.removeClass('highlight');   
                }   
        } else if (e.type === 'focus') {
        
        if( $this.val() === '' ) {
                label.removeClass('highlight'); 
                } 
        else if( $this.val() !== '' ) {
                label.addClass('highlight');
                }
        }

    });

    $('.tab a').on('click', function (e) {
    
    e.preventDefault();
    
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    
    target = $(this).attr('href');

    $('.tab-content > div').not(target).hide();
    
    $(target).fadeIn(600);
    
    });

  </script>
</body>
</html>
