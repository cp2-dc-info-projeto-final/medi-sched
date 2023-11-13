<?php  ?>


<!doctype html>
<html lang="pt-br">
  <head>
    <title>Atendimentos | Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href=".css"/>
    <link rel="stylesheet" href=".css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
  </head>
  <body class="fadeIn">

  <div id="header">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
              
              <a class="navbar-brand" href="#"></a>
              <a href="inicial.php"><img src=".img/logo.png" class="img-center" width="25%"/></a>
              
              <nav class="navbar navbar-expand-sm navbar-light bg-faded" id="topo">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              
              <div class="navbar-collapse" id="nav-content">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicial.php"> Início</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="atendimentos.php">Atendimentos</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="#sobre">Sobre</a>
                  </li>

                    <div class="navbar-collapse" id="nav-content">
                    <ul class="navbar-nav mr-auto">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Login </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="login.php">Como paciente</a>
                              <a class="dropdown-item" href="login-funcionario.php">Como funcionário</a>
                              <a class="dropdown-item" href="login-adm.html">Como administrador</a>
                            </div>
                          </li>
                      </ul>
                    </div>

                </ul>
              </div>
          </nav>
        </div>
    </div>

    

    <div id="slider">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <h1> Faça já seu cadastro e aproveite os nossos serviços</h1>
        <h4>Todo o carinho e a atenção que sua saúde merece!</h4>
        <a href="inicial.php" class="btn btn-outline-secondary button">Página inicial</a>
        <a href="cadastro_cliente.php" class="btn btn-primary button">Cadastra-se</a>
      </div>
      <div class="col-md-6 align-self-center text-center">
        <img src=".img/paciente.png" class="img-fluid" alt="Pacientes felizes">
      </div>
    </div>
  </div>
 
  <div class="container-fluid card">
        <h1 class="text-center mt-5 display-3 fw-bold"> <span class="theme-text">Conheça alguns de nossos atendimentos </span></h1>
        <hr class="mx-auto mb-5 w-25">
        <div class="row mb-5">
            <div class="col-12 col-sm-6 col-md-3 m-auto tamanho">
                <!-- card starts here -->
                <div class="card shadow">
                    <img src=".img/consulta.png" alt="" class="card-img-top" height= "300" >
                    <div class="card-body">
                        <h3 class="text-center">Consulta Geral </h3>
                        <hr class="mx-auto w-75">
                        <p>
                        Uma avaliação abrangente da saúde do paciente, onde o médico realiza um exame físico, 
                        revisa o histórico médico e discute quaisquer sintomas ou preocupações atuais para manter ou melhorar 
                        a saúde geral do paciente.

                        </p>
                    </div>
                </div>
                <!-- card ends here -->
            </div>
            <!-- col ends here -->
            
  

    <!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted" id="sobre">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
 </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4"> 
          <i class="fas fa-gem me-3"></i>Agenda+Saúde
          </h6>
          <p>
            Desde sua fundação, a Agenda+Saúde tem o compromisso de oferecer atendimento médico de qualidade com pontualidade e cuidado, 
            utilizando equipamentos modernos e um ambiente projetado para o conforto dos pacientes.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Acesso ao site
          </h6>
          <p>
            <a href="atendimentos.php" class="text-reset">Atendimentos</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Sobre</a>
          </p>
          
        </div>
        <!-- Grid column -->

        

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4" >Contato</h6>
          <p> <img src=".img/home.png" class="img-fluid" ><i class="fas fa-home me-3"></i> Rua Dr Manoel Reis - Duque de Caxias - Rj </p>
          <p> <img src=".img/mail.png" class="img-fluid" >
            <i class="fas fa-envelope me-3"></i>
            agendasaude1@gmail.com
          </p>
          <p ><img src=".img/phone.png" class="img-fluid" ><i class="fas fa-phone me-3"></i> (21) 98019-2431</p>
          <p><img src=".img/phone.png" class="img-fluid" ><i class="fas fa-print me-3"></i> (21) 98904-7495</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Direitos autorais:
    <a class="text-reset fw-bold" href="index.php">Agenda+Saúde</a>
  </div>
</footer>
<!-- Footer -->



</body>

<script> 
  
      jQuery(document).ready(function() {
                // Exibe ou oculta o botão
                jQuery(window).scroll(function() {
                    if (jQuery(this).scrollTop() > 200) {
                        jQuery('.topo-link').fadeIn(200);
                    } else {
                        jQuery('.topo-link').fadeOut(200);
                    }
                });
                
                // Faz animação para subir
                jQuery('.topo-link').click(function(event) {
                    event.preventDefault();
                    jQuery('html, body').animate({scrollTop: 0}, 300);
                })
            });

</script>


</html>
