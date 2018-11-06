<?php
// include_once "dbh.class.php";

/**
 *  Classe cuida do sistema de like
 */
class like extends Dbh
{
  protected $pdo;

  public function likeAdd($produto_id, $usuario_id){
    $query = $this->pdo->prepare('INSERT INTO ligacao_likes(usuario_id, produto_id, status_id)
                                                     VALUES(:usuario_id, :produto_id, :status_id)');
    $query->execute(["usuario_id"=>$usuario_id, "produto_id"=>$produto_id, "status_id"=>"1"]);
    return ["error"=> FALSE, "msg"=>"like_registrado"];
    // var_dump($_REQUEST);
  }

}

?>
