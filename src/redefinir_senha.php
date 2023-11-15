<!doctype html>
<html lang="pt-br">
  <head>
  	<title>Redefinir senha | Agenda+Saude</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />

	<link rel="stylesheet" href=".css">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>

	<body class="fadeIn">

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Redefinição de senha</h2>
				</div>
			</div>
            <div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-pencil"></span>
		      	</div>

		      	<h3 class="text-center mb-4">Insira sua nova senha</h3>
                  <?php
                        session_start(); 
                        if(isset($_SESSION['msg_rec'])){
                            echo $_SESSION['msg_rec'];
                            unset($_SESSION['msg_rec']);
                        }?>
                
                <form action="editlog.php" method="POST" class="needs-validation" novalidate>
                    
                    <div class="form-group label-float">
                        <div class="input-group mt-3">
                            <input type="hidden" name="operacao" value="recuperar-senha" required>
                            <input type="password" class="form-control" id="senhaalterar" name="senhaalterar" minlength="5" placeholder="Digite a senha (Mín. 5 caracteres)" required="required"> 
                        </div>
                    </div>

                    <div class="form-group label-float">
                        <div class="input-group mt-3">
                            <input type="password" class="form-control" id="confirmasenha" name="confirmasenha" placeholder="Confirme a senha (Mín. 5 caracteres)" minlength="5" required="required">
                        </div>

	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Redefinir</button>
                </form>
            </div>
        </div>
    </section>
    
    </body>
</html>
