<?php
$jsondb = "jsondb.json";
session_start();

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
      //$_SESSION["avatar"] = $item["avatar"];
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
  unset($cadastro["conf_password"]);
  $cadastro["password"] = password_hash($cadastro["password"], PASSWORD_DEFAULT);
  $db["user_list"][] = $cadastro;
  file_put_contents($jsondb, json_encode($db));
  return ["error" => FALSE, "msg" => "usuario cadastrado com sucesso"];
}

//var_dump($_REQUEST);
switch ($_REQUEST["acao"]) {
  case 'login':
    unset($_REQUEST["acao"]);
    if(login($_POST["login"], $_POST["password"])){
      echo "LOGIN COM SUCESSO!";
      //header("Location:index.php");
    }
    else{
      echo "LOGIN ERROR";
      //header("Location:erro.php");
    }
    break;

  case 'cadastro':
    unset($_POST["acao"]);
    $cad = cadastro($_POST);
    //var_dump($_POST);
    //var_dump($cad);
    if($cad["error"]==FALSE){
      //echo "CADASTRO REALIZADO!!!!!";
      header("Location:index.php");
    }
    else{
      // echo "CADASTRO ERRRO!!!!!";
      header("Location:cadastro.php");
    }
    break;

  case 'logout':
    session_destroy();
    header("Location:index.php");
    break;


  default:
    // code...
    // print error msg to console
    break;
}
 ?>

// estrutura do JSON:
// usuarios =>
//           [0]: "login", "senha", "email", "avatar"
//           [1]: "login", "senha", "email", "avatar" ...
