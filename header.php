<header>
  <div class="header_container">
    <div class="header_logo">
      <p>Skambit</p>
    </div>
    <form class="header_form" action="index.php" method="get">
      <input class="header_busca" type="search" placeholder="buscar..." name="busca" value="">
      <button class="header_busca_btn" type="submit"><i class="material-icons md-36">search</i></button>
    </form>
    <a class="header_link" href="index.php">home</a>
    <a class="header_link" href="#">categorias</a>
    <a class="header_link" href="faq.php">faqs</a>

    <!-- DROP MENU Login -->
    <i class="material-icons header_user dropdown" style="font-size: 60px; justify-self: center; align-self: center; ">account_circle
      <div class="drop_container">
        <form class="drop_menu" action="funcoes.php" method="post">
          <p class="drop_menu_text">login</p>
          <input class="drop_menu_item" type="text" name="login" value="" placeholder="usuario">
          <input class="drop_menu_item" type="password" name="password" value="" placeholder="senha">
          <button class="drop_menu_item" type="submit" name="acao" value="login">Entrar</button>
        <a class="drop_menu_item drop_menu_item__cadastro" href="cadastro.php" style="background-color: #2ecc71; color: white;"> cadastro </a>
      </form></div></i>
  </div>
</header>
