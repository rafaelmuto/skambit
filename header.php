<header class="efx_drop-shadow">
  <?php session_start(); ?>
  <div class="header_container">
    <div class="header_logo">
      <p>Skambit</p>
    </div>
    <form class="header_form" action="index.php" method="get">
      <input class="header_busca" type="search" placeholder="buscar..." name="busca" value="">
      <button class="header_busca_btn" type="submit"><i class="material-icons md-36">search</i></button>
    </form>
    <a class="header_link" href="index.php">home</a>
    <a class="header_link" href="index.php?categorias">categorias</a>
    <a class="header_link" href="faq.php">faqs</a>

    <!-- DROP MENU  -->
    <div class="header_user dropdown"><img class="header_avatar_img" src="<?php echo (isset($_SESSION["avatar"])?$_SESSION["avatar"]:"none.png")?>">
        <?php if(!isset($_SESSION["login"])): ?>
          <div class="drop_container efx_drop-shadow">
            <form class="drop_menu" action="funcoes.php" method="post">
                <p class="drop_menu_text">login</p>
                <input class="drop_menu_item" type="text" name="login" value="" placeholder="usuario">
                <input class="drop_menu_item" type="password" name="password" value="" placeholder="senha">
                <button class="drop_menu_item" type="submit" name="acao" value="login">Entrar</button>
                <a class="drop_menu_item" href="cadastro.php" style="background-color: #2ecc71; color: white;"> cadastro </a>
              </form>
          </div>
        <?php else: ?>
          <div class="drop_container efx_drop-shadow">
            <form class="drop_menu_log" action="funcoes.php" method="post">
              <img class="drop_menu_log_avatar" src="<?php echo $_SESSION["avatar"]?>" alt="avatar do usuario">
              <p class="drop_menu_text_log"><?php echo $_SESSION["login"]?></p>
              <a class="drop_menu_item" href="cadastro.php"> pagina do usuario </a>
              <button class="drop_menu_item" type="submit" name="acao" value="logout" style="background-color: #e74c3c; color: white;">Logout</button>
            </form>
          </div>
        <?php endif; ?>
     </div>
  </div>
</header>
