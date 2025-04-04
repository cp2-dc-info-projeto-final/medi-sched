<!doctype html>
<html lang="pt-br">
<head>
    <title>Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=".css/inicial.css"/>
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
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
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div
    <div id="slider">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <h1>A clínica mais completa para a sua saúde!</h1>
        <h4>Agende já uma consulta.</h4>
      </div>
      <div class="col-md-6 align-self-center text-center">
        <img src=".img/medi.png" class="img-fluid" alt="Imagem relacionada à saúde.">
      </div>
    </div>
  </div>
  <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-5 d-flex">
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0">
                        <img src=".img/medico.png" class="img-fluid"  height= "150" width="100%"alt="Imagem simbolizando a saúde." >
    				</div>
                    </div>
                    <div class="col-md-7 pl-md-5 py-md-5">
                    <div class="heading-section pt-md-5">
                        <h2 class="mb-4">Nossas Especialidades</h2>
                    </div>
                    <div class="row">
                        <!-- Ginecologia -->
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="text pl-3">
                                <h4>Ginecologia</h4>
                                <p>Atendimento integral à saúde feminina, desde consultas ginecológicas, exames preventivos, até acompanhamento obstétrico.</p>
                            </div>
                        </div>
                        
                        <!-- Psicologia -->
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="text pl-3">
                                <h4>Psicologia</h4>
                                <p>Serviços de psicologia para promover saúde mental, com terapia individual, de casal e em grupo, atendendo a diversas necessidades emocionais.</p>
                            </div>
                        </div>
                        
                        <!-- Odontologia -->
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="text pl-3">
                                <h4>Odontologia</h4>
                                <p>Cuidados completos com a saúde bucal, tratamentos estéticos e preventivos, ortodontia e odontopediatria para todas as idades.</p>
                            </div>
                        </div>
                        
                        <!-- Pediatria -->
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="text pl-3">
                                <h4>Pediatria</h4>
                                <p>Acompanhamento da saúde das crianças e adolescentes, promovendo o desenvolvimento saudável com atenção dedicada à pediatria preventiva e curativa.</p>
                            </div>
                        </div>
                        
                        <!-- Ortopedia -->
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="text pl-3">
                                <h4>Ortopedia</h4>
                                <p>Diagnóstico, tratamento e reabilitação de lesões musculoesqueléticas, com uma equipe de ortopedistas experientes e tecnologia avançada.</p>
                            </div>
                        </div>
                        
                        <!-- Vacinação -->
                        <div class="col-md-6 services-2 w-100 d-flex">
                            <div class="text pl-3">
                                <h4>Vacinação</h4>
                                <p>Programa completo de imunização para crianças, adultos e idosos, seguindo as diretrizes dos órgãos de saúde para prevenção de doenças.</p>
                            </div>
                        </div>
                    </div>
                </div>

    	</div>
    </section>

    </section>

    <a href="#" class="topo-link">&#9650;</a>

<footer class="text-center text-lg-start bg-light text-muted" id="rodape">
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
 </section>

  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4"> 
            <i class="fas fa-gem me-3"></i>Agenda+Saúde
          </h6>
          <p>
            Desde sua fundação, a Agenda+Saúde tem o compromisso de oferecer atendimento médico de qualidade com pontualidade e cuidado, utilizando equipamentos modernos e um ambiente projetado para o conforto dos pacientes.
          </p>
        </div>

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Acesso ao site
          </h6>
          <p>
            <a href="atendimentos.php" class="text-reset">Atendimentos</a>
          </p>

          
        </div>

        

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4" >Contato</h6>
          <p> <img src=".img/casa.png" class="img-fluid" ><i class="fas fa-casa me-3"></i> Rua Manoel Reis, 15 - Duque de Caxias- Rj </p>
          <p> <img src=".img/mail.png" class="img-fluid" >
            <i class="fas fa-envelope me-3"></i>
            agendasaude1@gmail.com
          </p>
          <p ><img src=".img/phone.png" class="img-fluid" ><i class="fas fa-phone me-3"></i> (21) 98019-2431</p>
          <p><img src=".img/phone.png" class="img-fluid" ><i class="fas fa-print me-3"></i> (21) 98904-7495</p>
        </div>
      </div>
    </div>
  </section>

  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Direitos autorais:
    <a class="text-reset fw-bold" href="index.php">Agenda+Saúde</a>
  </div>
</footer>
</footer>

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
