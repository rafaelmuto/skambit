@extends('layouts.main')
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">

@section('title', 'pagina principal')

@section('conteudo')
<section class="main_banner efx_drop_shadow"> banner </section>
<section class="main_grid">


  @isset($produtos)
    @foreach($produtos as $produto)
      <article class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url({{ $produto->imagem}});">
        <div class="main_card_info">
          <p>{{ $produto->nome }}</p>
          <p>{{ $produto->valor }}</p>
        </div>
        <a class="like_btn" href="#"><i class="like_btn_icon material-icons">thumb_up</i></a>
      </article>
    @endforeach
  @endisset

  <article class="main_card main_card_blank efx_border_radius">
      <a href="#?msg=new_prod"><i class="material-icons">add_circle_outline</i></a>
  </article>

</section>

@endsection
