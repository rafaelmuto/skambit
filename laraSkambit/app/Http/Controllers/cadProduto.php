<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class cadProduto extends Controller{
        
    public function listar(){
        $query = DB::select('SELECT * FROM cad_produto');    
        return $query;
      }
    
    public function listarUsuario($usuario_id){
        $lista = DB::prepare('SELECT produto_id FROM cad_produto WHERE usuario_id='.$usuario_id);
        $lista->execute([$usuario_id]);
        return $lista;
      }
    
      public function getlista(){
        return $this->pdo->query('SELECT produto_id FROM cad_produto WHERE status_id=1')->fetchall(PDO::FETCH_COLUMN);
      }
    
      public function getInfo($id){
        $info = $this->pdo->prepare('SELECT * FROM cad_produto WHERE produto_id=? ');
        $info->execute([$id]);
        return $info->fetchall(PDO::FETCH_ASSOC)[0];
      }
    
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
        /*$req->put('produto_id', $prod_id);
        $req->put('nome', $req->input('nome'));
        $req->put('descricao', $req->input('descricao'));
        $req->put('valor', $req->input('valor'));
        $req->put('imagem', $imagem);
        $req->put('usuario_id', $usuario_id);*/
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
}
    