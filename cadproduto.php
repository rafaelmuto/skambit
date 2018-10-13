<!DOCTYPE html>
<html dir="ltr">
<?php session_start() ?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/cadproduto.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="./javascript/html5.image.preview.js"></script>
    <title>Cadastro de produtos</title>
  </head>

  <body>
    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>

    <!-- ==== PRODUCT PAGE ==== -->
    <div class="productpage_container efx_drop_shadow efx_border_radius">
      <div class="headline efx_border_radius--top">
        <p>Cadastro de produto</p>
      </div>

      <div class="product_info">

        <div class="main_card main_card_blank efx_border_radius">
          <input type="file" name="imagefile" onchange="previewImage(this,[256],4);" />
            <div class="imagePreview"></div>
        </div>

          <form class="form_grid" action="" method="post" enctype="multipart/form-data">

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
              <input class="reg_button" alt="Cadastrar "type='submit' name='acao' value='Cadastrar'/>
            </div>

            <!--<div class="form_grid_item">
              <input id="pseudo_btn" type='file' name='imagefile' onchange="previewImage(this,[256],4)" style="display: none"/>
            </div> -->
          </form>

          </div>

    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>
</html>
