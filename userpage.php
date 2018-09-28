<!DOCTYPE html>
<html dir="ltr">
<?php session_start() ?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/userpage.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>User Page</title>
  </head>

  <body>
    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>

    <!-- ==== USER PAGE ==== -->
    <div class="userpage_container efx_drop_shadow efx_border_radius">
      <div class="headline efx_border_radius--top">
        <p>Usuario</p>
      </div>

      <div class="user_info">
        <img class="user_info_avatar efx_border_radius" src=" <?php echo $_SESSION["avatar"] ?>">
          <form class="form_grid" action="funcoes.php" method="post" enctype="multipart/form-data">

            <div class="form_grid_item">
              <label class="user_form_label" for="usuario">Usuario</label>
              <input class="user_form_input" type="text" name="login" value="<?php echo $_SESSION["login"] ?>">
            </div>
            <div class="form_grid_item">
              <label class="user_form_label" for="email">E-mail</label>
              <input class="user_form_input" type="email" name="email" value="<?php echo $_SESSION["email"] ?>">
            </div>
            <div class="form_grid_item">
              <label class="user_form_label" for="cep">CEP</label>
              <input class="user_form_input" type="text" name="cep" value="<?php echo $_SESSION["cep"] ?>">
            </div>
            <div class="form_grid_item">
              <label class="user_form_label" for="new_password">Nova senha</label>
              <input class="user_form_input" type="password" name="new_password" value="">
            </div>
            <div class="form_grid_item">
              <label class="user_form_label" for="conf_new_password">Confirmar nova senha</label>
              <input class="user_form_input" type="password" name="conf_new_password" value="">
            </div>
            <div class="form_grid_item">
              <label for="new_avatar" class="user_form_label">Avatar</label>
              <input class="user_form_input" type="file" name="new_avatar" value="">
            </div>
            <div class="form_grid_item">
              <label class="user_form_label" for="password">Senha</label>
              <input class="user_form_input" type="password" name="password" value="">
            </div>
            <div class="form_grid_item">
              <input class="reg_button" alt="modificar" type='submit' name='acao' value='modificar'/>
            </div>

          </form>
      </div>

      <div class="headline_sub">
        Meus Produtos
      </div>

      <div class="main_grid">
        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto1.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto2.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto3.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
        </article>

        <article class="main_card main_card_blank efx_border_radius">
            <a href="#?msg=new_prod"><i class="material-icons">add_circle_outline</i></a>
        </article>
      </div>

      <div class="headline_sub">
        Meus Likes
      </div>

      <div class="main_grid">
        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto6.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto7.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto8.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto9.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto10.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto11.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto12.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card main_card_blank efx_border_radius">
            <a href="#?msg=new_prod"><i class="material-icons">add_circle_outline</i></a>
        </article>

      </div>



    </div>

    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>
</html>
