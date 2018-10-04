<?php
$jsondb = "jsondb.json"; // --- nome do arquivo JSON
session_start();

// --- verifica e cria a pasta para armazenar os avatares
if(!is_dir("foto_produtos/")){
  mkdir("foto_produtos/");
}

  // --- essa parte da funcao cuida do upload e manuseio das imagens de avatar
  if($_FILES["carregar_foto"]["error"]==UPLOAD_ERR_OK){
    $timestamp = date("YmdHis");
    $file_ext = explode(".", strtolower($_FILES["carregar_foto"]["name"]));
    $file_name = $timestamp. "_" .$cadastro["login"] .".". $file_ext[1];
    $file = $_FILES["carregar_foto"]["tmp_name"];
    move_uploaded_file($file, "foto_produtos/".$file_name);
    $cadastro["avatar"] = "foto_produtos/".$file_name;
  }
  else{
    $cadastro["avatar"] = "foto_produto/none.png";
  }
  var_dump($jsondb);
 ?>
