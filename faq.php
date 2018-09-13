<!DOCTYPE html>
<html dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/faq.css">
    <title>FAQ - Perguntas e Respostas</title>
  </head>

  <body>

    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>

    <!-- ==== MAIN FAQS ==== -->
    <div class="main">
      <div class="container_faq">
        <div class="headline_faq">
          <a>FAQ - Perguntas e Respostas</a>
        </div>
        <div class="cont_faq_body">
          <div class="wrap-collabsible">
            <input id="collapsible" class="toggle" type="checkbox" >
            <label for="collapsible" class="lbl-toggle">O que é Skambit ?</label>
            <div class="collapsible-content">
              <div class="content-inner">
                <p>
                  Skambit é um marketplace de troca de mercadorias.
                </p>
              </div>
            </div>
          </div>
          <div class="wrap-collabsible">
            <input id="collapsible2" class="toggle" type="checkbox" >
            <label for="collapsible2" class="lbl-toggle">Posso trocar qualquer tipo de produto ?</label>
            <div class="collapsible-content">
              <div class="content-inner">
                <p>
                  Sim, no Skambit você pode trocar qualquer tipo de produto.
                </p>
              </div>
            </div>
          </div>
          <div class="wrap-collabsible">
            <input id="collapsible3" class="toggle" type="checkbox" >
            <label for="collapsible3" class="lbl-toggle">Como vou receber o que foi trocado ?</label>
            <div class="collapsible-content">
              <div class="content-inner">
                <p>
                  Você pode combinar isto diretamente com quem você irá fazer a troca. O Skambit somente coloca vocês em contato.
                </p>
              </div>
            </div>
          </div>
          <div class="wrap-collabsible">
            <input id="collapsible4" class="toggle" type="checkbox" >
            <label for="collapsible4" class="lbl-toggle">Os dados do cadastro serão armazenados de forma segura ?</label>
            <div class="collapsible-content">
              <div class="content-inner">
                <p>
                  Sim, aqui no Skambit você pode ficar tranquilo. Nossa equipe de profissionais cuidam da segurança dos seus dados.
                </p>
              </div>
            </div>
          </div>
          <div class="wrap-collabsible">
            <input id="collapsible5" class="toggle" type="checkbox" >
            <label for="collapsible5" class="lbl-toggle">Existe troca de serviços ?</label>
            <div class="collapsible-content">
              <div class="content-inner">
                <p>
                  Ainda não, mas é uma das funcionalidades que iremos implantar no futuro.
                </p>
              </div>
            </div>
          </div>
          <div class="wrap-collabsible">
            <input id="collapsible6" class="toggle" type="checkbox" >
            <label for="collapsible6" class="lbl-toggle">Os produtos trocados possuem garantia ?</label>
            <div class="collapsible-content">
              <div class="content-inner">
                <p>
                  Os produtos são de responsabilidade do usuario, o Skambit somente coloca os usuarios em contato.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>

</html>
