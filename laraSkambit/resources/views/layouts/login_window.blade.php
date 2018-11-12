@if(Session::has('login'))
<div class="drop_container efx_drop_shadow efx_border_radius">
  <form class="drop_menu_log" action="funcoes.php" method="post">
    <img class="drop_menu_log_avatar efx_border_radius" src="{{ Session::get('avatar') }}" alt="avatar do usuario">
    <p class="drop_menu_text_log">{{ Session::get('login') }}</p>
    <a class="drop_menu_item" href="userpage.php"> pagina do usuario </a>
    <a class="drop_menu_item" href="cadproduto.php"> cadastrar produto </a>
    <button class="drop_menu_item" type="submit" name="acao" value="logout" style="background-color: #e74c3c; color: white;">Logout</button>
  </form>
</div>

@else
<div class="drop_container efx_drop_shadow efx_border_radius">
  <form class="drop_menu" action="../public/login" method="post">
      <p class="drop_menu_text">login</p>
      {!! csrf_field() !!}
      <input class="drop_menu_item" type="text" name="login" value="" placeholder="usuario">
      <input class="drop_menu_item" type="password" name="senha" value="" placeholder="senha">
      <button class="drop_menu_item" type="submit" name="acao" value="login">Entrar</button>
      <a class="drop_menu_item" href="cadastro.php" style="background-color: #2ecc71; color: white;"> cadastro </a>
    </form>
</div>

@endif
