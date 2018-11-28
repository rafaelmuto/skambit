@extends('layouts.main')
<link rel="stylesheet" href="css/cadProduto.css">

@section('title', 'Cadastro de produto')

@section('conteudo')
<div class="productpage_container efx_drop_shadow efx_border_radius">
  <div class="headline efx_border_radius--top">
    <p>Cadastro de produto</p>
  </div>
    <form class="product_info" action="cadProduto" method="post" enctype="multipart/form-data">
    @csrf
  
      <!-- No futuro incluir o imagem preview

        <div class="main_card main_card_blank efx_border_radius">
        <input type="file" name="imagefile" onchange="previewImage(this,[256],4);"/>
        <div class="imagePreview"></div> 
      </div> -->
      
      <div class="form_grid">
        <div class="form_grid_item">
          <label class="product_form_label" for="nome">Nome do produto</label>
          <input class="product_form_input" type="text" name="nome" value="">
        </div>
        <div class="form_grid_item">
          <label class="product_form_label" for="descricao">Descrição</label>
          <input class="product_form_input" type="text" name="descricao" value="">
        </div>
        <div class="form_grid_item">
          <label class="product_form_label" for="valor">Valor</label>
          <input class="product_form_input" type="text" name="valor" value="">
        </div>
        <div class="form_grid_item">
          <label class="product_form_label" for="imagem">Imagem</label>
          <input class="product_form_input" type="file" name="imagem">
        </div>
        <div class="form_grid_item">
          <button class="reg_button" type="submit" name="acao" value="cad_prod">Cadastrar</button>
        </div>
      </div>
    </form>
</div>
@endsection
