@extends('layouts.main')
<link rel="stylesheet" href="../css/upProduto.css">

@section('title', 'Alteração de produto')

@section('conteudo')
<div class="productpage_container efx_drop_shadow efx_border_radius">
  <div class="headline efx_border_radius--top">
    <p>Alteração de produto</p>
  </div>
    <form class="product_info" action="{{ $upproduto[0]->produto_id }}" method="post" enctype="multipart/form-data">
    @csrf
    <img class="user_info_imagem efx_border_radius" src="../{{ $upproduto[0]->imagem }}">
      <!-- No futuro incluir o imagem preview

        <div class="main_card main_card_blank efx_border_radius">
        <input type="file" name="imagefile" onchange="previewImage(this,[256],4);"/>
        <div class="imagePreview"></div> 
      </div> -->
      
      <div class="form_grid">
        <div class="form_grid_item">
          <label class="product_form_label" for="nome">Nome do produto</label>
          <input class="product_form_input" type="text" name="nome" value="{{ $upproduto[0]->nome }}">
        </div>
        <div class="form_grid_item">
          <label class="product_form_label" for="descricao">Descrição</label>
          <input class="product_form_input" type="text" name="descricao" value="{{ $upproduto[0]->descricao }}">
        </div>
        <div class="form_grid_item">
          <label class="product_form_label" for="valor">Valor</label>
          <input class="product_form_input" type="text" name="valor" value="{{ $upproduto[0]->valor }}">
        </div>
        <div class="form_grid_item">
          <label class="product_form_label" for="imagem">Imagem</label>
          <input class="product_form_input" type="file" name="imagem">
        </div>
        <div class="form_grid_item">
          <button class="reg_button" alt="modificar" type="submit" name="modificar" value="modificar">modificar</button>
        </div>
      </div>
    </form>
</div>
@endsection
