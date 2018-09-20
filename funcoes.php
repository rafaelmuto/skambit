<?php
$jsondb = "jsondb.json";
session_start();
if(!is_dir("avatares/")){
  mkdir("avatares/");
}

function login($login, $senha){
  global $jsondb;
  if(file_exists($jsondb)){
    $db = json_decode(file_get_contents($jsondb), TRUE);
  }
  else{
    $db = ["user_list" => []];
  }
  foreach ($db["user_list"] as $id => $item) {
    if($login == $item["login"] && password_verify($senha,$item["password"])){
      $_SESSION["login"] = $item["login"];
      $_SESSION["avatar"] = $item["avatar"];
      return TRUE;
    }
  }
  return FALSE;
}

function cadastro($cadastro){
  global $jsondb;
  if($cadastro["password"] != $cadastro["conf_password"]){
    return ["error" => TRUE, "msg" => "senhas não conferem"];
  }
  if(file_exists($jsondb)) $db = json_decode(file_get_contents($jsondb),TRUE);
  else $db = ["user_list" => []];

  //var_dump($db);
  foreach($db["user_list"] as $id => $item) {
    if($item["login"] == $cadastro["login"]){
      return ["error" => TRUE, "msg" => "usuario já cadatrado"];
    }
  }
  if($_FILES["avatar"]["error"]==UPLOAD_ERR_OK){
    $timestamp = date("YmdHis");
    $file_ext = explode(".", strtolower($_FILES["avatar"]["name"]));
    $file_name = $timestamp. "_" .$cadastro["login"] .".". $file_ext[1];
    $file = $_FILES["avatar"]["tmp_name"];
    move_uploaded_file($file, "avatares/".$file_name);
    $cadastro["avatar"] = "avatares/".$file_name;
  }
  unset($cadastro["conf_password"]);
  $cadastro["password"] = password_hash($cadastro["password"], PASSWORD_DEFAULT);
  $db["user_list"][] = $cadastro;
  file_put_contents($jsondb, json_encode($db));
  return ["error" => FALSE, "msg" => "usuario cadastrado com sucesso"];
}

switch ($_REQUEST["acao"]) {
  case 'login':
    unset($_REQUEST["acao"]);
    if(login($_POST["login"], $_POST["password"])){
      header("Location:index.php?msg=login_ok");
    }
    else{
      header("Location:index.php?msg=login_erro");
    }
    break;

  case 'cadastro':
    unset($_POST["acao"]);
    $cad = cadastro($_POST);
    if($cad["error"]==FALSE){
      login($_POST["login"], $_POST["password"]);
      header("Location:index.php?msg=cadastro_ok");
    }
    else{
      header("Location:cadastro.php?msg=cadastro_erro");
    }
    break;

  case 'logout':
    session_destroy();
    header("Location:index.php?msg=logout_ok");
    break;

  default:
    header("Location:index.php?msg=switch_error");
    break;
}
 ?>
