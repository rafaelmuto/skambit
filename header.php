<header class="efx_drop_shadow">
  <div class="header_container">
    <div class="header_logo">
      <p>Skambit</p>
    </div>
    <form class="header_form" action="index.php" method="get">
      <input class="header_busca" type="search" placeholder="buscar..." name="busca" value="">
      <button class="header_busca_btn" type="submit"><i class="material-icons md-36">search</i></button>
    </form>
    <a class="header_link" href="index.php">home</a>
    <a class="header_link" href="faq.php">faqs</a>
    <div class="header_link">
      <input type="checkbox" id="login_window" style="display:none;" />
      <label for="login_window"> <?php echo (isset($_SESSION["login"])?$_SESSION["login"]:"login") ?></label>
      <?php include("login_window.php") ?>
    </div>
    <!-- DROP MENU  -->
    <div class="header_user dropdown"><label for="login_window"><img class="header_avatar_img" src="<?php echo (isset($_SESSION["avatar"])?$_SESSION["avatar"]:"avatares/none.png" )?>"></label>
      <?php include("login_window.php") ?>
     </div>

  </div>
</header>
