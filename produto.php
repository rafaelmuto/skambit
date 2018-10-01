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

    <!-- ==== PRODUTO ==== -->
    <div class="prod_container efx_drop_shadow efx_border_radius">
      <div class="prod_container_img efx_border_radius--top" style="background: url(./imagens/produto1.jpg);">
        <div class="main_card_info">
          <p>nome do produto</p>
          <p>R$ 100,00</p>
        </div>
        <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
      </div>
      <div class="prod_container_text">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>

</html>
