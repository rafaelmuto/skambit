@extends('layouts.main')
<link rel="stylesheet" href="../css/delProduto.css">

@section('title', 'Alteração de produto')

@section('conteudo')
<div class="productpage_container efx_drop_shadow efx_border_radius">
  <div class="headline efx_border_radius--top">
    <p>Alteração de produto</p>
  </div>
    <form class="product_info" action="{{ $delproduto[0]->produto_id }}" method="post" enctype="multipart/form-data">
    @csrf
    <img class="user_info_imagem efx_border_radius" src="../{{ $delproduto[0]->imagem }}">
      <!-- No futuro incluir o imagem preview

        <div class="main_card main_card_blank efx_border_radius">
        <input type="file" name="imagefile" onchange="previewImage(this,[256],4);"/>
        <div class="imagePreview"></div> 
      </div> -->
      
      <div class="form_grid">
        <div class="form_grid_item">
          <label class="product_form_label" for="nome">Nome do produto</label>
          <input class="product_form_input" type="text" name="nome" value="{{ $delproduto[0]->nome }}">
        </div>
        <div class="form_grid_item">
          <label class="product_form_label" for="descricao">Descrição</label>
          <input class="product_form_input" type="text" name="descricao" value="{{ $delproduto[0]->descricao }}">
        </div>
        <div class="form_grid_item">
          <label class="product_form_label" for="valor">Valor</label>
          <input class="product_form_input" type="text" name="valor" value="{{ $delproduto[0]->valor }}">
        </div>
        <div class="form_grid_item">
          <button class="reg_button" alt="deletar" type="submit" name="deletar" value="deletar">deletar</button>
        </div>
      </div>
    </form>
</div>
@endsection
