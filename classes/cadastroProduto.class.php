<?php
include_once "Dbh.class.php";

/**
 * Classe extente de dbh e cuida do registro dos produtos:
 *
 */
class cadastroProduto extends Dbh
{
  protected $pdo;

  public function listar(){
    return $this->pdo->query('SELECT * FROM cad_produto')->fetchall(PDO::FETCH_ASSOC);
  }

  public function add($array){
    $array["usuario_id"] = $_SESSION["usuario_id"];
    $array["data"] = date('Y-m-d');
    $array["status_id"] = 1;
    $query = $this->pdo->prepare('INSERT INTO cad_produto(usuario_id, nome, descricao, data, status_id, valor)
                                                VALUES( :usuario_id, :nome, :descricao, :data, :status_id, :valor )');
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
