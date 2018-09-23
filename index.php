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
    <div class="main">
      <section class="main_banner"></section>
      <ul class="main_grid">
        <li class="main_card">
          <a href="produto.php">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto1.jpg" alt="bolsa">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            </a>
            <a href="produto.php"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto2.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto3.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto4.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto5.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto6.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto7.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto8.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto9.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto10.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto11.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
        <li class="main_card">
          <figure>
            <img class="main_card--img hover-opacity" src="./imagens/produto12.jpg" alt="sapatilha">
          </figure>
          <div class="main_card--info">
            <div>
              <p>Nome do Produto</p>
              <p class="price">R$ 10,00</p>
            </div>
            <a href="#"><i class="material-icons">thumb_up</i></a>
          </div>
        </li>
      </ul>
    </div>


    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>

</html>
