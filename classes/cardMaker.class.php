<?php
include_once "cadastroProduto.class.php";
/**
 *  Essa classe cuidara de criar os cards de produto e criar a pagina do produto!
 * - __construct($id) seta os valores do objeto com as infos do produto_id = $id
 */
class cardMaker extends cadastroProduto
{
  protected $produto_id;
  protected $usuario_id;
  protected $nome;
  protected $descricao;
  protected $imagem;
  protected $data;
  protected $status_id;
  protected $valor;

  protected $pdo;

  public function printCard($i){
    $info = $this->getInfo($i);
    $this->produto_id = $info["produto_id"];
    $this->usuario_id = $info["usuario_id"];
    $this->nome = $info["nome"];
    $this->descricao = $info["descricao"];
    $this->imagem = $info["imagem"];
    $this->data = $info["data"];
    $this->status_id = $info["status_id"];
    $this->valor = $info["valor"];
    echo '<div class="main_card hover-opacity efx_drop_shadow efx_border_radius" style="background: url(' . $this->imagem . ');"><div class="main_card_info"><p>' . $this->nome . '</p><p>R$ ' . $this->valor . '</p></div><a class="like_btn" href=" #"><i class="like_btn_icon material-icons">thumb_up</i></a><a class="main_card_link" href="produto.php?produto_id=' . $this->produto_id . '"></a></div>';
  }

}

?>
