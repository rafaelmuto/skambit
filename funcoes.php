<?php

$jsondb = "jsondb.json"; // --- nome do arquivo JSON
session_start();

// --- verifica e cria a pasta para armazenar os avatares
if(!is_dir("avatares/")){
  mkdir("avatares/");
}


// ==== SWITCH ROUTING ====

switch ($_REQUEST["acao"]) {
  case 'login':
    include "classes/cadastroUsuario.class.php";
    unset($_REQUEST["acao"]);
    if((new cadastroUsuario)->login($_POST)){
      header("Location:main.php?msg=login_ok");
    }
    else{
      header("Location:main.php?msg=login_erro");
    }
    break;

  case 'cadastro':
    include "classes/cadastroUsuario.class.php";
    unset($_POST["acao"]);
    $cad = (new cadastroUsuario)->add($_POST);
    if($cad["error"]==FALSE){
      (new cadastroUsuario)->login($_POST);
      header("Location:main.php?msg=cadastro_ok");
    }
    else{
      header('Location:cadastro.php?msg='.$cad["msg"]);
    }
    break;

  case 'logout':
    session_destroy();
    header("Location:main.php?msg=logout_ok");
    break;

  case 'modificar':
    include "classes/cadastroUsuario.class.php";
    unset($_POST["acao"]);
    $mod = (new cadastroUsuario)->mod($_POST);
    if($mod["error"]==FALSE){
      (new cadastroUsuario)->login($_POST);
      header("Location:main.php?msg=mod_ok");
    }
    else{
      header("Location:userpage.php?msg=".$mod["msg"]);
    }
    break;

  default:
    header("Location:index.php?msg=switch_error,log=".$_REQUEST["acao"]);
    break;
}
 ?>
