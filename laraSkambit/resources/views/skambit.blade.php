<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>laraSkambit - @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/head.css') }}" >

  </head>
  <body>

    <header class="efx_drop_shadow">
      <div class="header_container">
        <div class="header_logo">
          <p>Skambit</p>
        </div>
        <form class="header_form" action="main.php" method="get">
          <input class="header_busca" type="search" placeholder="buscar..." name="busca" value="">
          <button class="header_busca_btn" type="submit"><i class="material-icons md-36">search</i></button>
        </form>
        <a class="header_link" href="main.php">home</a>
        <a class="header_link" href="faq.php">faqs</a>
        <div class="header_user">
          <input type="checkbox" id="login_window" style="display:none;" />
          <label for="login_window"> <?php echo (isset($_SESSION["login"])?$_SESSION["login"]:"login") ?></label>
          <label for="login_window"><img class="header_avatar_img" src="<?php echo (isset($_SESSION["avatar"])?$_SESSION["avatar"]:"avatares/none.png" )?>"></label>
          @include('login_window')
        </div>
      </div>
    </header>


    <h1>laraskambit</h1>
    <h1>{{ $time }}</h1>







  </body>
</html>
