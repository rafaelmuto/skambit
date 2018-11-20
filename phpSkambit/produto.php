<!DOCTYPE html>
<html dir="ltr">
<?php session_start() ?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/headerfooter.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Skambit</title>
  </head>

  <body>

    <!-- ==== HEADER ==== -->
    <?php include("header.php") ?>


    <!-- ==== PRODUTO ==== -->
    <?php
      include_once "classes/cardMaker.class.php";
      include_once "classes/like.class.php";

      if(isset($_GET["like"])){
        $produto_id = $_GET["like"];
        $usuario_id = $_SESSION["usuario_id"];
        (new like)->likeAdd($produto_id, $usuario_id);
      }

      $produto = (new cardMaker)->pageInfo($_GET["produto_id"]);
     ?>
    <div class="prod_container efx_drop_shadow efx_border_radius">
      <div class="prod_container_img efx_border_radius--top" style="background: url(<?php echo $produto['imagem']; ?>);">
        <div class="main_card_info">
          <p><?php echo $produto['nome'];  ?></p>
          <p>R$ <?php echo $produto['valor']; ?></p>
        </div>
        <a class="like_btn" href="produto.php?produto_id=<?php echo $produto["produto_id"]; ?>&like=<?php echo $produto["produto_id"]; ?>"><i class="like_btn_icon material-icons">thumb_up</i></a>
      </div>
      <div class="prod_container_text">
        <p><?php echo $produto['descricao'] ?></p>
      </div>
    </div>

    <!-- ==== FOOTER ==== -->
    <?php include("footer.php") ?>
  </body>

</html>
