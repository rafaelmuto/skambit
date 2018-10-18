<?php
include "Dbh.class.php";

/**
 * Classe extente de dbh e cuida do registro dos usuarios:
 * - listar() retorna array com todo conteudo da tabela usuarios
 * - getInfo($id) retorna array assoc com todos os campos do usuario_id = $id
 * - getLogins() retorna array numerada com todos os logins
 * - getNomes($nome) retorna array numerada contendo os primeiro_nome ou ultimo_nome de todos os usuarios
 * - add($cadastro) recebe $array assoc, onde as chaves tem o mesmo nome dos campos da tabela, e adiciona usuario ao cadastro e retorna array contendo msg de erro
 * - login($array) recebe array com login e senha e retorna bool
 */

class cadastroUsuario extends Dbh
{
  protected $pdo;

  public function listar(){ // mudar para private
    return $this->pdo->query('SELECT * FROM usuarios')->fetchall(PDO::FETCH_ASSOC);
  }

  public function getInfo($id){
    // pq essa porra nao funciona qnd eu executo em uma linha soh????...
    $query = $this->pdo->prepare('SELECT * FROM usuarios WHERE usuario_id=?');
    $query->execute([$id]);
    return $query->fetchall(PDO::FETCH_ASSOC)[0];
  }

  public function getLogins(){ // mudar para private
    return $this->pdo->query('SELECT login FROM usuarios')->fetchall(PDO::FETCH_COLUMN);
  }

  public function getEmails(){ // mudar para private
    return $this->pdo->query('SELECT email FROM usuarios')->fetchall(PDO::FETCH_COLUMN);
  }

  public function getNomes($nome){ // mudar para private
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
    $user_list = $this->getLogins();
    foreach($user_list as $id => $item) {
      if($item == $cadastro["login"]){
        return ["error" => TRUE, "msg" => "usuario já cadatrado"];
      }
    }
    // --- essa parte da funcao cuida do upload e manuseio das imagens de avatar
    $cadastro["avatar"] = $this->setAvatar();
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

  public function login($array){
    $login = $array["login"];
    $senha = $array["senha"];
    $lista = $this->listar();
    foreach ($lista as $key => $item) {
      if($item["login"]==$login){
        if(password_verify($senha,$item["senha"])){
          $_SESSION["usuario_id"] = $item["usuario_id"];
          $_SESSION["login"] = $item["login"];
          $_SESSION["primeiro_nome"] = $item["primeiro_nome"];
          $_SESSION["ultimo_nome"] = $item["ultimo_nome"];
          $_SESSION["email"] = $item["email"];
          $_SESSION["cep"] = $item["cep"];
          $_SESSION["avatar"] = $item["avatar"];
          return TRUE;
        }
      }
    }
    return FALSE;
  }

  public function mod($array){
    $usuario = $this->getInfo($_SESSION["usuario_id"]);
    if(!password_verify($array["senha"],$this->getInfo($usuario["usuario_id"])["senha"])){
      return ["error" => TRUE, "msg" => "senha errada!"];
    }
    if($array["primeiro_nome"]!=$usuario["primeiro_nome"] && $array["ultimo_nome"]!=$usuario["ultimo_nome"]  && in_array($array["primeiro_nome"],$this->getNomes('primeiro')) && in_array($array["ultimo_nome"],$this->getNomes('ultimo'))){
      return ["error" => TRUE, "msg" => "nome ja cadastrado"];
    }
    if($array["login"]!=$usuario["login"] && in_array($array["login"],$this->getLogins())){
      return ["error" => TRUE, "msg" => "login ja cadastrado"];
    }
    if($array["nova_senha"]!=$array["conf_nova_senha"]){
      return ["error" => TRUE, "msg" => "nova senha nao confere"];
    }
    if($array["email"]!=$usuario["email"] && in_array($array["email"],$this->getEmails())){
      return ["error" => TRUE, "msg" => "email ja cadastrado"];
    }
    if($avatar = $this->setAvatar()){
      $array["avatar"] = $avatar;
    }
    else{
      $array["avatar"] = $usuario["avatar"];
    }
    $array["usuario_id"] = $usuario["usuario_id"];
    $array["senha"] = password_hash($array["senha"], PASSWORD_DEFAULT);
    $array["data"] = date('Y-m-d');
    $array["status_id"] = $usuario["status_id"];
    $array["rating"] = $usuario["rating"];
    unset($array["nova_senha"]);
    unset($array["conf_nova_senha"]);
    $query = $this->pdo->prepare('UPDATE usuarios SET primeiro_nome = :primeiro_nome,
                                                      ultimo_nome = :ultimo_nome,
                                                      cep = :cep,
                                                      login = :login,
                                                      senha = :senha,
                                                      avatar = :avatar,
                                                      email = :email,
                                                      data = :data,
                                                      status_id = :status_id,
                                                      rating = :rating
                                                    WHERE usuario_id = :usuario_id');
    $query->execute($array);
    return ["error" => FALSE, "msg" => "update ok"];
  }

  private function setAvatar(){
    if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"]==UPLOAD_ERR_OK){
      $timestamp = date("YmdHis");
      $file_ext = explode(".", strtolower($_FILES["avatar"]["name"]));
      $file_name = $timestamp. "_" .$_SESSION["login"] .".". $file_ext[1];
      $file = $_FILES["avatar"]["tmp_name"];
      move_uploaded_file($file, "avatares/".$file_name);
      return "avatares/".$file_name;
    }
    else{
      return FALSE;
    }
  }


}
?>
