@extends('layouts.main')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">

@section('title', 'pagina principal')

@section('conteudo')
<section class="main_banner efx_drop_shadow"> banner </section>
<section class="main_grid">


  @isset($produtos)
    @foreach($produtos as $produto)
      <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url({{ $produto->imagem }});">
        <div class="main_card_info">
          <p>{{ $produto->nome }}</p>
          <p>R$ {{ $produto->valor }}</p>
        </div>
        <a class="like_btn" href="like/{{ $produto->produto_id }}"><i class="like_btn_icon material-icons">thumb_up</i></a>
        <a class="main_card_link" href="produto/{{ $produto->produto_id }}"></a>
      </article>
    @endforeach
  @endisset


</section>

@endsection
