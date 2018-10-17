<?php

$jsondb = "jsondb.json"; // --- nome do arquivo JSON
session_start();

// --- verifica e cria a pasta para armazenar os avatares
if(!is_dir("avatares/")){
  mkdir("avatares/");
}


// ==== FUNCAO DE LOGIN ====

function login($log){
  $login = $log["login"];
  $senha = $log["password"];
  global $jsondb;
  if(file_exists($jsondb)){
    $db = json_decode(file_get_contents($jsondb), TRUE);
  }
  else{
    $db = ["user_list" => []];
  }
  foreach ($db["user_list"] as $id => $item) {
    if($login == $item["login"] && password_verify($senha,$item["password"])){
      $_SESSION["id"] = $id;
      $_SESSION["login"] = $item["login"];
      $_SESSION["email"] = $item["email"];
      $_SESSION["cep"] = $item["cep"];
      $_SESSION["password"] = $item["password"];
      $_SESSION["avatar"] = $item["avatar"];
      return TRUE;
    }
  }
  return FALSE;
}


// ==== FUNCAO DE MODIFICAÇÃO DE CADASTRO ====

function modcadastro($modificar){
  global $jsondb;
  $db = json_decode(file_get_contents($jsondb),TRUE);
  if(password_verify($modificar["password"],$_SESSION["password"]) && $modificar["new_password"] == $modificar["conf_new_password"]){
    $db["user_list"][$_SESSION["id"]]["login"] = $modificar["login"];
    $db["user_list"][$_SESSION["id"]]["email"] = $modificar["email"];
    $db["user_list"][$_SESSION["id"]]["cep"] = $modificar["cep"];
    $db["user_list"][$_SESSION["id"]]["login"] = $modificar["login"];
    if($modificar["new_password"] != ''){
      // var_dump(  $db["user_list"][$_SESSION["id"]]["password"]);
      $db["user_list"][$_SESSION["id"]]["password"] = password_hash($modificar["new_password"], PASSWORD_DEFAULT);
    }
    if($_FILES["new_avatar"]["error"] == UPLOAD_ERR_OK){
      $timestamp = date("YmdHis");
      $file_ext = explode(".", strtolower($_FILES["new_avatar"]["name"]));
      $file_name = $timestamp. "_" .$modificar["login"] .".". $file_ext[1];
      $file = $_FILES["new_avatar"]["tmp_name"];
      move_uploaded_file($file, "avatares/".$file_name);
      // deletar o arquivo antigo; $db["user_list"][$_SESSION["id"]]["avatar"]
      $db["user_list"][$_SESSION["id"]]["avatar"] = "avatares/".$file_name;
    }
    file_put_contents($jsondb, json_encode($db));
    return ["error" => FALSE, "msg" => "informacoes modificadas"];
  }
  else{
    return ["error" => TRUE, "msg" => "senha nao confere"];
  }
}


// ==== SWITCH ROUTING ====

switch ($_REQUEST["acao"]) {
  case 'login':
    unset($_REQUEST["acao"]);
    if(login($_POST)){
      header("Location:index.php?msg=login_ok");
    }
    else{
      header("Location:index.php?msg=login_erro");
    }
    break;

  case 'cadastro':
    include "classes/cadastroUsuario.class.php";
    unset($_POST["acao"]);
    $cad = (new cadastroUsuario)->add($_POST);
    if($cad["error"]==FALSE){
      // login($_POST);
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

  case 'modificar':
    unset($_POST["acao"]);
    $mod = modcadastro($_POST);
    if($mod["error"]==FALSE){
      login($_POST);
      header("Location:index.php?msg=mod_ok");

    }
    else{
      header("Location:userpage.php?msg=msd_error");
    }
    break;

  default:
    header("Location:index.php?msg=switch_error,log=".$_REQUEST["acao"]);
    break;
}
 ?>
