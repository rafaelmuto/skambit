<!DOCTYPE html>
<html dir="ltr">
<?php session_start() ?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Skambit</title>
  </head>

  <body>

    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>

    <!-- ==== MAIN ==== -->
      <section class="main_banner efx_drop_shadow"></section>
      <section class="main_grid">

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto1.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto2.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto3.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto4.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto5.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article>

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

        <!-- <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(./imagens/produto12.jpg);">
          <div class="main_card_info">
            <p>nome do produto</p>
            <p>R$ 100,00</p>
          </div>
          <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
        </article> -->

        <article class="main_card main_card_blank efx_border_radius">
            <a href="#?msg=new_prod"><i class="material-icons">add_circle_outline</i></a>
        </article>

      </section>
    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>

</html>
