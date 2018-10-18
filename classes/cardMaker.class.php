<?php
include_once "cadastroProduto.class.php";
/**
 *  Essa classe cuidara de criar os cards de produto e criar a pagina do produto!
 * - __construct($id) seta os valores do objeto com as infos do produto_id = $id
 */
class cardMaker extends cadastroProduto
{

  protected $pdo;

  public function printCard($i){
    $info = $this->getInfo($i);
    $produto_id = $info["produto_id"];
    $usuario_id = $info["usuario_id"];
    $nome = $info["nome"];
    $descricao = $info["descricao"];
    $imagem = $info["imagem"];
    $data = $info["data"];
    $status_id = $info["status_id"];
    $valor = $info["valor"];
    echo '<div class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(' . $imagem . ');"><div class="main_card_info"><p>' . $nome . '</p><p>R$ ' . $valor . '</p></div><a class="like_btn" href=" #"><i class="like_btn_icon material-icons">thumb_up</i></a><a class="main_card_link" href="produto.php?produto_id=' . $produto_id . '"></a></div>';
  }

  public function pageInfo($id){
    return $this->getInfo($id);
  }

}

?>
