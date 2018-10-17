<?php
include "Dbh.class.php";

/**
 * Classe extente de dbh e cuida do registro dos usuarios:
 * - listar() retorna array com todo conteudo da tabela usuarios
 * - getInfo($id) retorna array assoc com todos os campos do usuario_id = $id
 * - getLogins() retorna array numerada com todos os logins
 * - getNomes($nome) retorna array numerada contendo os primeiro_nome ou ultimo_nome de todos os usuarios
 * - add($cadastro) recebe $array assoc, onde as chaves tem o mesmo nome dos campos da tabela, e adiciona usuario ao cadastro e retorna array contendo msg de erro
 */
class cadastroUsuario extends Dbh
{
  protected $pdo;

  public function listar(){
    return $this->pdo->query('SELECT * FROM usuarios')->fetchall(PDO::FETCH_ASSOC);
  }

  public function getInfo($id){
    // pq essa porra nao funciona qnd eu executo em uma linha soh????...
    $query = $this->pdo->prepare('SELECT * FROM usuarios WHERE usuario_id=?');
    $query->execute([$id]);
    return $query->fetchall(PDO::FETCH_ASSOC)[0];
  }

  public function getLogins(){
    return $this->pdo->query('SELECT login FROM usuarios')->fetchall(PDO::FETCH_COLUMN);
  }

  public function getNomes($nome){
    if($nome=='primeiro'){
      return $this->pdo->query('SELECT primeiro_nome FROM usuarios')->fetchall(PDO::FETCH_COLUMN);
    }
    elseif($nome=='ultimo'){
      return $this->pdo->query('SELECT ultimo_nome FROM usuarios')->fetchall(PDO::FETCH_COLUMN);
    }
    else{
      return NULL;
    }
  }

  public function add($cadastro){
    // --- checagem basica das senhas
    if($cadastro["senha"] != $cadastro["conf_senha"]){
      return ["error" => TRUE, "msg" => "senhas não conferem"];
    }
    unset($cadastro["conf_senha"]);
    // --- checa se o nome do usuario ja esta cadastrado !!!! mudar essa parte para checar contra o skambitdb!!!
    $user_list = (new cadastroUsuario)->getLogins();
    foreach($user_list as $id => $item) {
      if($item == $cadastro["login"]){
        return ["error" => TRUE, "msg" => "usuario já cadatrado"];
      }
    }
    // --- essa parte da funcao cuida do upload e manuseio das imagens de avatar
    if($_FILES["avatar"]["error"]==UPLOAD_ERR_OK){
      $timestamp = date("YmdHis");
      $file_ext = explode(".", strtolower($_FILES["avatar"]["name"]));
      $file_name = $timestamp. "_" .$cadastro["login"] .".". $file_ext[1];
      $file = $_FILES["avatar"]["tmp_name"];
      move_uploaded_file($file, "avatares/".$file_name);
      $cadastro["avatar"] = "avatares/".$file_name;
    }
    else{
      $cadastro["avatar"] = "avatares/none.png";
    }
    // --- criptografa a senha
    $cadastro["senha"] = password_hash($cadastro["senha"], PASSWORD_DEFAULT);
    $cadastro["data"] = date('Y-m-d');
    $cadastro["status_id"] = 1;
    $cadastro["rating"] = 5;
    $query = $this->pdo->prepare('INSERT INTO usuarios( `primeiro_nome`,
                                                        `ultimo_nome`,
                                                        `cep`,
                                                        `login`,
                                                        `senha`,
                                                        `avatar`,
                                                        `email`,
                                                        `data`,
                                                        `status_id`,
                                                        `rating`)
                                                VALUES( :primeiro_nome,
                                                        :ultimo_nome,
                                                        :cep,
                                                        :login,
                                                        :senha,
                                                        :avatar,
                                                        :email,
                                                        :data,
                                                        :status_id,
                                                        :rating)');
    var_dump($cadastro);
    $query->execute($cadastro);
    return ["error" => FALSE, "msg" => "usuario cadastrado com sucesso"];
  }

}
?>
