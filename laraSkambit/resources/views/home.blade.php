@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">

@section('title', 'pagina principal')

@section('conteudo')

<!-- <section class="main_banner efx_drop_shadow"> banner </section> -->

<section class="main_grid">


  @isset($produtos)
    @foreach($produtos as $produto)
      <article id="produto_{{ $produto->produto_id }}" class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url({{ url($produto->imagem) }});">
        <div class="main_card_info">
          <p>{{ $produto->nome }}</p>
          <p>R$ {{ $produto->valor }}</p>
        </div>
        <a id="like_{{ $produto->produto_id }}" class="like_btn" href="like/{{ $produto->produto_id }}"><i class="like_btn_icon material-icons">thumb_up</i></a>
        <a id="card_{{ $produto->produto_id }}" class="main_card_link main_card_link_AJAX" href="{{ url($produto->produto_id) }}"></a>
      </article>
    @endforeach
  @endisset

  @empty($produtos)
    <p> nenhum produto encontrado</p>
  @endempty

</section>

@extends('layouts.modal')

@endsection

<script type="text/javascript" src="{{ asset('js/modal.js') }}"></script>
