<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="bootstrap-4.4.1-dist/css/bootstrap.css" rel="stylesheet" >
    <script src="bootstrap-4.4.1-dist/js/bootstrap.js"></script>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">
    <style>
        nav {
            background-color: #87CEEB; /* Cor de fundo */
            text-align: center;
            padding: 12px; /* Adicione espaço acima e abaixo do entalhe azul */
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav a {
            text-decoration: none;
            color: black; /* Cor do texto */
            font-size: 20px;
        }

        .logo {
            color: #FF0000; /* Cor vermelha para o "+" */
            font-size: 24px; /* Tamanho da fonte para o nome */
            font-weight: bold; /* Negrito para o nome */
            position: absolute;
            left: 20px; /* Distância da esquerda */
            top: 10px; /* Distância do topo */
        }

    </style>
    <title>Página Principal</title>
</head>
<body>
    <nav>
        <div class="logo">Agenda<span style="color: #FF0000;">+</span>Saúde</div>
        <ul>
            <li><a href="cadastro.php">Criar Conta</a></li>
            <li><a href="login.php">Entrar</a></li>
            <li><a href="funcionario.php">É um Profissional da Área de Saúde</a></li>
        </ul>
    </nav>
</body>
</html>
