<!DOCTYPE html>
<html dir="ltr">
<?php session_start() ?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <title>Login</title>
  </head>

  <body>

    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>

    <!-- ==== LOGIN MOBILE ==== -->
    <?php if(!isset($_SESSION["login"])): ?>
      <div class="login_mobile efx_drop_shadow efx_border_radius">
        <form class="drop_menu" action="funcoes.php" method="post">
            <p class="drop_menu_text">login</p>
            <input class="drop_menu_item" type="text" name="login" value="" placeholder="usuario">
            <input class="drop_menu_item" type="password" name="password" value="" placeholder="senha">
            <button class="drop_menu_item" type="submit" name="acao" value="login">Entrar</button>
            <a class="drop_menu_item" href="cadastro.php" style="background-color: #2ecc71; color: white;"> cadastro </a>
          </form>
      </div>
    <?php else: ?>
      <div class="login_mobile efx_drop_shadow efx_border_radius">
        <form class="drop_menu_log" action="funcoes.php" method="post">
          <img class="drop_menu_log_avatar efx_border_radius" src="<?php echo $_SESSION["avatar"]?>" alt="avatar do usuario">
          <p class="drop_menu_text_log"><?php echo $_SESSION["login"]?></p>
          <a class="drop_menu_item" href="userpage.php"> pagina do usuario </a>
          <button class="drop_menu_item" type="submit" name="acao" value="logout" style="background-color: #e74c3c; color: white;">Logout</button>
        </form>
      </div>
    <?php endif; ?>

<!-- ==== FOOTER ==== -->
<?php include("footer.php") ?>
</body>

</html>
