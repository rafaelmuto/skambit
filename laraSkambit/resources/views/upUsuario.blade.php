@extends('layouts.main')
<link rel="stylesheet" href="{{ URL::asset('css/upUsuario.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

@section('title', 'pagina principal')

@section('conteudo')
<div class="userpage_container efx_drop_shadow efx_border_radius">
  <div class="headline efx_border_radius--top">
    <p>Usuario</p>
  </div>

  <div class="user_info">
    <img class="user_info_avatar efx_border_radius" src="{{ Session::get('avatar') }}">
      <form class="form_grid" action="upUsuario" method="post" enctype="multipart/form-data">
        @csrf
        <!-- <div class="form_grid_item"> -->
          <!-- <label class="user_form_label" for="usuario">Usuario</label> -->
          <input class="user_form_input" type="hidden" name="login" value="{{ Session::get('login') }}">
        <!-- </div> -->
        <div class="form_grid_item">
          <label class="user_form_label" for="primeiro_nome">Nome</label>
          <input class="user_form_input" type="text" name="primeiro_nome" value="{{ Session::get('primeiro_nome') }}">
        </div>
        <div class="form_grid_item">
          <label class="user_form_label" for="ultimo_nome">Nome</label>
          <input class="user_form_input" type="text" name="ultimo_nome" value="{{ Session::get('ultimo_nome') }}">
        </div>
        <div class="form_grid_item">
          <label class="user_form_label" for="email">E-mail</label>
          <input class="user_form_input" type="email" name="email" value="{{ Session::get('email') }}">
        </div>
        <div class="form_grid_item">
          <label class="user_form_label" for="cep">CEP</label>
          <input class="user_form_input" type="text" name="cep" onblur="pesquisacep(this.value);" value="{{ Session::get('cep') }}">
        </div>
        <div class="form_grid_item">
          <label class="user_form_label" for="nova_senha">Nova senha</label>
          <input class="user_form_input" type="password" name="nova_senha" value="">
        </div>
        <div class="form_grid_item">
          <label class="user_form_label" for="conf_nova_senha">Confirmar nova senha</label>
          <input class="user_form_input" type="password" name="conf_nova_senha" value="">
        </div>
        <div class="form_grid_item">
          <label for="new_avatar" class="user_form_label">Avatar</label>
          <input class="user_form_input" type="file" name="avatar" value="">
        </div>
        <div class="form_grid_item">
          <label class="user_form_label" for="senha">Senha</label>
          <input class="user_form_input" type="password" name="senha" value="">
        </div>
        <div class="form_grid_item">
          <input class="reg_button" alt="modificar" type='submit' name='acao' value='modificar'/>
        </div>
      </form>
  </div>

    <div class="headline_sub">
      Meus Produtos
    </div>

    <div class="main_grid efx_drop_shadow efx_border_radius">
      @isset($meusProdutos)
      @foreach($meusProdutos as $produto)
        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url({{ $produto->imagem }});">
          <div class="main_card_info">
            <p>{{ $produto->nome }}</p>
            <p>R$ {{ $produto->valor }}</p>
          </div>
          <!-- <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a> -->
          <a class="main_card_link" href="upProduto/{{ $produto->produto_id }}"></a>
        </article>
      @endforeach
      @endisset

    <article class="main_card main_card_blank efx_border_radius">
        <a href="cadProduto"><i class="material-icons">add_circle_outline</i></a>
    </article>
  </div>

  @isset($meusLikes)
    <div class="headline_sub">
      Meus Likes
    </div>

    <div class="main_grid  efx_drop_shadow efx_border_radius">
      @foreach($meusLikes as $produto)
        <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url({{ $produto->imagem}});">
          <div class="main_card_info">
            <p>{{ $produto->nome }}</p>
            <p>R$ {{ $produto->valor }}</p>
          </div>
          <!-- <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a> -->
          <a id="card_{{ $produto->produto_id }}" class="main_card_link main_card_link_AJAX" href="produto/{{ $produto->produto_id }}"></a>
        </article>
      @endforeach
    </div>
  @endisset


  @isset($meusMatchs)
    <div class="headline_sub">
      Meus Matchs
    </div>
    <div class="main_grid_match">
      @foreach($meusMatchs as $match)
      <div class="mini_grid_container efx_drop_shadow efx_border_radius">
        <article class="mini_grid efx_drop_shadow efx_border_radius">
          @foreach($match['meusProdutos'] as $produto)
            <div class="mini_card efx_drop_shadow efx_border_radius" style="background: url({{ $produto->imagem }});">

            </div>
          @endforeach
        </article>

        <article class="mini_grid_info efx_drop_shadow efx_border_radius">
          <div class="match_info">
            <p>{{ $match['usuario']->primeiro_nome }} {{ $match['usuario']->ultimo_nome }} deu like nos seus produtos acima.</p>
            <p>E-Mail: {{ $match['usuario']->email }}</p>
            <p>CEP: {{ $match['usuario']->cep }}</p>
          </div>
          <img class="match_avatar" src="{{ $match['usuario']->avatar }}" alt="">
          <img class="match_avatar" src="{{ Session::get('avatar') }}" alt="">
          <div class="match_info">
            <p>Voce deu like nos produtos abaixo:</p>
            <p>Entre em contado e troquem seus produtos!</p>
          </div>
        </article>

        <article class="mini_grid efx_drop_shadow efx_border_radius">
          @foreach($match['meusLikes'] as $produto)
            <div class="mini_card efx_drop_shadow efx_border_radius" style="background: url({{ $produto->imagem }});">

            </div>
          @endforeach
        </article>
      </div>
      @endforeach

    </div>
  @endisset


</div>

@extends('layouts.modal_like')

<script type="text/javascript" src="{{ asset('js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/verCEP.js') }}"></script>
