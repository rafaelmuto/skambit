<?php
include_once "Dbh.class.php";

/**
 * Classe extente de dbh e cuida do registro dos produtos:
 * - listar() retorna lista completa da tabela
 * - listarUsuario($id) lista produtos do usuario_id = $id retorna array numerada com os produto_id
 * - getlista() retorna array com os produto_ids q tenham status_id==1
 * - getInfo($produto_id) retorna info do produto com $produto_id
 * - add($array) retorna bool e add info a tabela cad_produto, $array eh array asssoc com os nomes dos campos da tabela => valores
 * - getImage() retorna FALSE ou o path da imagem salva
 */
class cadastroProduto extends Dbh
{
  protected $pdo;


  public function listar(){
    return $this->pdo->query('SELECT * FROM cad_produto')->fetchall(PDO::FETCH_ASSOC);
  }

  public function listarUsuario($usuario_id){
    $lista = $this->pdo->prepare('SELECT produto_id FROM cad_produto WHERE usuario_id=?');
    $lista->execute([$usuario_id]);
    return $lista->fetchall(PDO::FETCH_COLUMN);
  }

  public function getlista(){
    return $this->pdo->query('SELECT produto_id FROM cad_produto WHERE status_id=1')->fetchall(PDO::FETCH_COLUMN);
  }

  public function getInfo($id){
    $info = $this->pdo->prepare('SELECT * FROM cad_produto WHERE produto_id=? ');
    $info->execute([$id]);
    return $info->fetchall(PDO::FETCH_ASSOC)[0];
  }

  public function add($array){
    $array["usuario_id"] = $_SESSION["usuario_id"];
    $array["status_id"] = 1;
    $array["imagem"] = $this->getImage();
    $query = $this->pdo->prepare('INSERT INTO cad_produto( usuario_id, nome, descricao, status_id, valor, imagem)
                                                   VALUES( :usuario_id, :nome, :descricao, :status_id, :valor, :imagem )');
    $query->execute($array);
    return ["error"=>FALSE, "msg"=>'cadastro_ok'];
  }

  private function getImage(){
    if(isset($_FILES["imagefile"]) && $_FILES["imagefile"]["error"]==UPLOAD_ERR_OK){
      $timestamp = date("YmdHis");
      $file_ext = explode(".", strtolower($_FILES["imagefile"]["name"]));
      $file_name = $_SESSION["login"] . "_" . $timestamp . "." . $file_ext[1];
      $file = $_FILES["imagefile"]["tmp_name"];
      move_uploaded_file($file, "prod_images/".$file_name);
      return "prod_images/".$file_name;
    }
    else{
      return FALSE;
    }
  }
}

?>
