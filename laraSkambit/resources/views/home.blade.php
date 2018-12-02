@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

@section('title', 'pagina principal')

@section('conteudo')

<!-- <section class="main_banner efx_drop_shadow"> banner </section> -->

<section class="main_grid">


  @isset($produtos)
    @foreach($produtos as $produto)
      <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url({{ $produto->imagem }});">
        <div class="main_card_info">
          <p>{{ $produto->nome }}</p>
          <p>R$ {{ $produto->valor }}</p>
        </div>
        <a class="like_btn" href="like/{{ $produto->produto_id }}"><i class="like_btn_icon material-icons">thumb_up</i></a>
        <a class="main_card_link" href="{{ url('produto/'.$produto->produto_id) }}"></a>
      </article>
    @endforeach
  @endisset


</section>

<div id="modalProduto" class="modalProduto modalOff efx_drop_shadow efx_border_radius">
  modal produto
  <button id="modalClose" type="button" name="button"> fechar </button>
</div>

@endsection




<script type="text/javascript" src="{{ asset('js/modal.js') }}"></script>
