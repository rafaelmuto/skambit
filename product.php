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
    <div class="container">
      <nav class="sidenav">
        <ul>
          <li><a href="#"><img src="imagens/produto2.jpg" alt="Produto"></a></li>
          <li><a href="#"><img src="imagens/produto3.jpg" alt="Produto"></a></li>
          <li><a href="#"><img src="imagens/produto4.jpg" alt="Produto"></a></li>
          <li><a href="#"><img src="imagens/produto5.jpg" alt="Produto"></a></li>
        </ul>
      </nav>

      <main class="content">
          <div class="title">
            <h1>Lojinha da Ana</h1>
            <span>desapegando</span>
          </div>
          
          <div class="link">
            <div>
              <span class="link_img"><img src="imagens/avatar.png" alt="avatar"></span>
              <a class="link_click">Perfil</a>
            </div>
            <div>
              <span class="link_img"><img src="imagens/loja.png" alt="loja"></span>
              <a class="link_click">Seguir</a>
            </div>
          </div>

            <h2 class="title col-wide">Pulseira Super Estilosa!</h2>
            <img class="col-wide" src="imagens/produto8.jpg" alt="Produto">
            <button class="btn-products col-wide">MATCH</button>
          
            <ul class="info-products">
              <li>Condição: </li>
              <li>Tamanho: </li>
              <li>Cor: </li>
              <li>Marca: </li>
            </ul>

          <div class="info">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt beatae recusandae delectus dolorem aperiam harum nemo explicabo deserunt assumenda, commodi eligendi labore vitae nisi deleniti enim provident consequatur, natus ad!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quasi ea quidem cumque sint necessitatibus corporis eum provident adipisci porro id quaerat, autem repellat architecto accusamus inventore commodi fugiat fuga.</p>
          </div>
          
        </main>
        
        <aside class="shop">
          <h4 class="title">Você também pode gostar...</h4>
          <div class="shop-item">
            <img src="imagens/produto11.jpg" alt="Produto">
          </div>
          
          <div class="shop-item">
            <img src="imagens/produto12.jpg" alt="Produto">
          </div>
        </aside>
    </div>

      <!-- ==== FOOTER ==== -->
      <?php include("footer.php") ?>
  </body>

</html>