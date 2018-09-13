<!DOCTYPE html>
<html dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/cadastro.css">
    <title>Cadastro</title>
  </head>

  <body>

    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>

    <div class="main">
          <div class="container_cadastro">
        <div class="headline">
          <a>Cadastro</a>
        </div>
        <div class="cont_cadastro_body">
          <div class="photo">
            <i class="material-icons" id="photo_select" style="font-size: 150px; color: grey;">account_circle</i>
          </div>
          <form class="form_cadastro" method="post">
            <input class="cad_form_input" type="text" name="firstname" value="" required autocomplete="off">
            <label class="cad_form_label" for="yourname">Nome</label>

            <div class="divisor"></div>

            <input class="cad_form_input" type="text" name="surname" value="" required autocomplete="off">
            <label class="cad_form_label" for="yourname">Sobrenome</label>

            <div class="divisor"></div>

            <input class="cad_form_input" type="email" name="email" value="" required autocomplete="off">
            <label class="cad_form_label" for="email">E-mail</label>

            <div class="divisor"></div>

            <input class="cad_form_input" type="text" name="cep" value="" required autocomplete="off">
            <label class="cad_form_label" for="cep">CEP</label>

            <div class="divisor"></div>

            <input class="cad_form_input" type="password" name="password" value="" required autocomplete="off">
            <label class="cad_form_label" for="password">Senha</label>

            <div class="divisor"></div>

            <input class="cad_form_input" type="password" name="conf_password" value="" required autocomplete="off">
            <label class="cad_form_label" for="conf_password">Confirmação de senha</label>

            <div class="divisor"></div>

            <div class="cont_textarea">
              <label class="cad_form_label" for='textarea'>Interesses</label>
              <textarea class="textarea" maxlength="250">

              </textarea>
              <span id="chars">250 / 250</span>
              <div class="divisor"></div>

              <div class="button">
                <input class="reg_button" alt="Cadastrar "type='submit' name='Submit' value='Cadastrar'/>
                <input class="reg_button" type='button' value="Voltar"/><a href="index.html" target="_blank"></a>

              </div>
            </div>
        </div>
        </form>
      </div>
    </div>

    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>

</html>
