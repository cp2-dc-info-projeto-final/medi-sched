<!doctype html>
<html lang="pt-br">
<head>
    <title>Atendimentos | Agenda+Saúde</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=".img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
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
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        
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
        <a href="index.php" class="btn btn-outline-secondary button">Página inicial</a>
        <a href="cadastro.php" class="btn btn-primary button">Cadastre-se</a>
      </div>
      <div class="col-md-6 align-self-center text-center">
        <img src=".img/paciente.png" class="img-fluid" alt="Pacientes felizes">
      </div>
    </div>
  </div>
 
  <div class="container my-5">
        <h1 class="text-center mt-5 display-3 fw-bold">Conheça nossos Atendimentos</h1>
        <hr class="mx-auto mb-5 w-25">

    <!-- Atendimento - Consulta Geral -->
    <div class="row atendimento mb-5 flex-row-reverse">
        <div class="col-md-6">
            <img src=".img/consulta.png" alt="Consulta Geral" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Consulta Geral</h3>
            <p>Durante uma consulta geral, o paciente recebe uma avaliação abrangente de sua saúde. 
                O médico realiza um exame físico completo, revisa o histórico médico e discute quaisquer sintomas ou preocupações atuais. 
                Este tipo de consulta visa manter e melhorar a saúde geral do paciente.</p>
        </div>
    </div>

    <!-- Atendimento - Exames de Rotina -->
    <div class="row atendimento mb-5">
        <div class="col-md-6">
            <img src=".img/exames.png" alt="Exames de Rotina" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Exames de Rotina</h3>
            <p>Os exames de rotina são procedimentos preventivos essenciais, incluindo hemogramas completos, exames de urina e testes de colesterol. 
                Eles são fundamentais para a detecção precoce de doenças e para monitorar a saúde contínua dos pacientes.</p>
        </div>
    </div>

    <!-- Atendimento - Atendimento de Urgência -->
    <div class="row atendimento mb-5 flex-row-reverse">
        <div class="col-md-6">
            <img src=".img/urgencia.png" alt="Atendimento de Urgência" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Atendimento de Urgência</h3>
            <p>Nosso atendimento de urgência é dedicado a condições que requerem atenção imediata, mas não são graves o suficiente para uma visita ao pronto-socorro. 
                Isso inclui tratamento de cortes que necessitam de suturas, infecções leves, febres e outras condições semelhantes.</p>
        </div>
    </div>

    <!-- Atendimento - Check-up Anual -->
    <div class="row atendimento mb-5">
        <div class="col-md-6">
            <img src=".img/checkup.png" alt="Check-up Anual" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Check-up Anual</h3>
            <p>O check-up anual é uma avaliação preventiva que checa o estado geral da saúde do paciente. Inclui uma série de exames de sangue, 
                aferição de pressão arterial e outros testes específicos baseados na idade e no perfil de risco do paciente.</p>
        </div>
    </div>

    <!-- Atendimento - Vacinação -->
    <div class="row atendimento mb-5 flex-row-reverse">
        <div class="col-md-6">
            <img src=".img/vacina.png" alt="Vacinação" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Vacinação</h3>
            <p>Oferecemos serviços completos de vacinação para prevenir contra doenças infecciosas. Seguimos o calendário de vacinação recomendado para todas as faixas etárias e condições de saúde, 
                garantindo proteção e prevenção para nossos pacientes.</p>
        </div>
    </div>

    <!-- Atendimento - Gerenciamento de Doenças Crônicas -->
    <div class="row atendimento mb-5">
        <div class="col-md-6">
            <img src=".img/gerenciamento.png" alt="Gerenciamento de Doenças Crônicas" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Gerenciamento de Doenças Crônicas</h3>
            <p>Nosso serviço de gerenciamento de doenças crônicas proporciona acompanhamento e tratamento contínuo para condições como diabetes, hipertensão e asma. 
                Inclui ajuste de medicação, educação para o autocontrole e monitoramento de complicações.</p>
        </div>
    </div>

    <!-- Atendimento - Serviços de Saúde Mental -->
    <div class="row atendimento mb-5 flex-row-reverse">
        <div class="col-md-6">
            <img src=".img/mental.png" alt="Serviços de Saúde Mental" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Serviços de Saúde Mental</h3>
            <p>Nossos serviços de saúde mental incluem consultas com psicólogos e psiquiatras para tratar questões como depressão, ansiedade e transtornos de humor. 
                Oferecemos terapia e medicamentos conforme necessário, em um ambiente acolhedor e de apoio....</p>
        </div>
    </div>

    <!-- Atendimento - Saúde da Mulher -->
    <div class="row atendimento mb-5">
        <div class="col-md-6">
            <img src=".img/mulher.png" alt="Saúde da Mulher" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h3>Saúde da Mulher</h3>
            <p>Especializamo-nos em saúde da mulher, oferecendo serviços focados em ginecologia e obstetrícia. 
                Isso inclui exames pélvicos, testes de Papanicolau, orientação contraceptiva, 
                cuidados pré-natais e acompanhamento durante a menopausa.</p>
        </div>
    </div>
</div>

                
                
    </div>
</div>
  

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
          <p> <img src=".img/home.png" class="img-fluid" ><i class="fas fa-home me-3"></i> Rua Manoel Gomes, 20 - Duque de Caxias- Rj </p>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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


</html>    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready(function() {
            // Exibe ou oculta o botão de retorno ao topo
            jQuery(window).scroll(function() {
                if (jQuery(this).scrollTop() > 200) {
                    jQuery('.topo-link').fadeIn(200);
                } else {
                    jQuery('.topo-link').fadeOut(200);
                }
            });

            // Faz animação para subir ao topo da página
            jQuery('.topo-link').click(function(event) {
                event.preventDefault();
                jQuery('html, body').animate({scrollTop: 0}, 300);
            });
        });
    </script>

</body>
</html>
