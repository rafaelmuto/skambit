<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class cadProduto extends Controller{

  public function add(Request $req){
    if($req->isMethod('GET')){
      return view('cadProduto');
    }
    if($req->session()->get('usuario_id') === null){
      return redirect('home');
    }
    $login = $req->session()->get('login');
    $imagem = $this->setImagem($req->input('imagem'));
    $usuario_id = $req->session()->get('usuario_id');
    $prod_id = DB::table('cad_produto')->insert(["nome"=>$req->input('nome'),
                                                 "descricao"=>$req->input('descricao'),
                                                 "valor"=>$req->input('valor'),
                                                 "imagem"=>$imagem,
                                                 "usuario_id"=>$usuario_id,
                                                 "status_id"=>1
                                               ]);
    return view('cadProduto');
  }

  private function setImagem(){
     if(!is_dir("imagem/")){
      mkdir("imagem/");
  }

    if(isset($_FILES["imagem"]) && $_FILES["imagem"]["error"]==UPLOAD_ERR_OK){
    $timestamp = date("YmdHis");
    $file_ext = explode(".", strtolower($_FILES["imagem"]["name"]));
    $file_name = $timestamp."_".".".$file_ext[1];
    $file = $_FILES["imagem"]["tmp_name"];
    move_uploaded_file($file, "imagem/".$file_name);
    return "imagem/".$file_name;
  }else{
    return false;
    }
  }

  public function update($prod_id, Request $req){
    if($req->session()->get('usuario_id') == null){
      return redirect('home');
  }

    $upproduto = DB::table('cad_produto')->where('produto_id', '=', $prod_id)->get();
     if($req->isMethod('GET')){
      return view('upProduto',["upproduto"=>$upproduto,]);
      //return var_dump($upproduto);
    }

    $imagem = $this->setImagem($req->input('usuario_id'));
    if($imagem==false){
    $imagem = $upproduto[0]->imagem;
    }

    DB::table('cad_produto')->where('produto_id', $prod_id)->update(["nome"=>$req->input('nome'),
                                                                     "descricao"=>$req->input('descricao'),
                                                                     "valor"=>$req->input('valor'),
                                                                     "imagem"=>$imagem
                                                                    ]);
    return redirect('home');
  }

  public function delete($prod_id, Request $req){
    if($req->session()->get('usuario_id') == null){
      return redirect('home');
  }

  $delproduto = DB::table('cad_produto')->where('produto_id', '=', $prod_id)->get();
  if($req->isMethod('GET')){
    return view('delProduto',["delproduto"=>$delproduto,]);
  }

  $imagem = $this->setImagem($req->input('usuario_id'));
  if($imagem==false){
    $imagem = $delproduto[0]->imagem;
  }

  $usuario_id = $req->session()->get('usuario_id');
  DB::table('cad_produto')->where('produto_id', $prod_id)->update(["nome"=>$req->input('nome'),
                                                                   "descricao"=>$req->input('descricao'),
                                                                   "valor"=>$req->input('valor'),
                                                                   "imagem"=>$imagem,
                                                                   "usuario_id"=>$usuario_id,
                                                                   "status_id"=>2
                                                                 ]);
  return redirect('home');
  }

}
