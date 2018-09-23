<!DOCTYPE html>
<html dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/product.css">
    <title>Produto</title>
  </head>

  <body>

    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>

    <!-- ==== MAIN ==== -->
      <ul class="product-grid">
        <li class="main_card product-card">
          <h2>Nome do Vendedor</h2>
          <figure>
            <img src="./imagens/avatar.png" alt="">
          </figure>
          <div>
            <p>Informações do Vendedor</p>
          </div>
          <div>
            <a href="">Math</a>
          </div>
        </li>
        <li class="main_card wide">
          <h2>Nome do Produto</h2>
          <figure>
            <img class="product_card--img" src="./imagens/produto1.jpg" alt="">
          </figure>
          <div>
            <h4>Detalhes do Produto</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit beatae optio!</p>
          </div>
        </li>
      </ul>

      <h3>Você também pode se interessar...</h3>
      <ul class="main_grid">
      
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
      </ul>
    <!-- ==== FOOTER ==== -->
        <?php include("footer.php") ?>
  </body>

</html>