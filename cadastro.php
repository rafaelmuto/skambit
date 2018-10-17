<!DOCTYPE html>
<html dir="ltr">
<?php session_start() ?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/cadastro.css">
    <title>Cadastro</title>
  </head>

  <body>

    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>

    <!-- ==== CADASTRO ==== -->

          <div class="container_cadastro efx_drop_shadow efx_border_radius">

              <div class="headline efx_border_radius--top">
                <p>Cadastro</p>
              </div>

              <form class="form_grid efx_border_radius--bot" action="funcoes.php" method="post" enctype="multipart/form-data">
                <div class="form_grid_item">
                  <input class="cad_form_input" type="text" name="login" value="" required autocomplete="off">
                  <label class="cad_form_label" for="login">Login</label>
                </div>

                <div class="form_grid_item">
                  <input class="cad_form_input" type="text" name="primeiro_nome" value="" required autocomplete="off">
                  <label class="cad_form_label" for="primeiro_nome">Nome</label>
                </div>

                <div class="form_grid_item">
                  <input class="cad_form_input" type="text" name="ultimo_nome" value="" required autocomplete="off">
                  <label class="cad_form_label" for="ultimo_nome">Sobrenome</label>
                </div>

                <div class="form_grid_item">
                  <input class="cad_form_input" type="email" name="email" value="" required autocomplete="off">
                  <label class="cad_form_label" for="email">E-mail</label>
                </div>
                <div class="form_grid_item">
                  <input class="cad_form_input" type="text" name="cep" value="" required autocomplete="off">
                  <label class="cad_form_label" for="cep">CEP</label>
                </div>
                <div class="form_grid_item">
                  <input class="cad_form_input" type="password" name="senha" value="" required autocomplete="off">
                  <label class="cad_form_label" for="senha">Senha</label>
                </div>
                <div class="form_grid_item">
                  <input class="cad_form_input" type="password" name="conf_senha" value="" required autocomplete="off">
                  <label class="cad_form_label" for="conf_senha">Confirmação de senha</label>
                </div>
                <div class="form_grid_item">
                  <input class="cad_form_input" type="file" name="avatar" value="">
                  <label for="avatar" class="cad_form_label">Avatar</label>
                </div>
                <div class="form_grid_item">
                  <input class="reg_button" alt="Cadastrar "type='submit' name='acao' value='cadastro'/>
                </div>
              </form>

          </div>



    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>

</html>
