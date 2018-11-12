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
      <label for="login_window"> @if(Session::has('login')) {{ Session::get('login') }} @else login @endif</label>
      <label for="login_window"><img class="header_avatar_img" src=" @if(Session::has('avatar')) {{ Session::get('avatar') }} @else avatares/none.png  @endif"></label>
      @include('layouts.login_window')
    </div>
  </div>
</header>
