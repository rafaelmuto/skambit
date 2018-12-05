<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function main(Request $req){
      if($req->session()->get('usuario_id') !== null){
      $lista = DB::select('SELECT * FROM cad_produto WHERE cad_produto.usuario_id != '.$req->session()->get('usuario_id').' AND cad_produto.produto_id not in (SELECT ligacao_likes.produto_id FROM ligacao_likes WHERE ligacao_likes.usuario_id = '.$req->session()->get('usuario_id').' AND ligacao_likes.status_id = 1) AND cad_produto.status_id = 1');
        shuffle($lista);
      }
      else {
        $lista = DB::table('cad_produto')->where('status_id',1)->get()->shuffle();
      }
      return view('home',["produtos"=>$lista]);
    }
    public function faqs(){
      return view('faqs');
    }

    public function like($produto_id,Request $req){
      if($req->session()->get('usuario_id') !== null){
        DB::table('ligacao_likes')->insert(["usuario_id"=>$req->session()->get('usuario_id'),"produto_id"=>$produto_id, "status_id"=>1]);
        // $matches = DB::select('SELECT * from ligacao_likes WHERE usuario_id = (SELECT cad_produto.usuario_id FROM cad_produto WHERE cad_produto.produto_id ='. $produto_id .') and EXISTS (SELECT * from cad_produto WHERE cad_produto.usuario_id = '. $req->session()->get('usuario_id') .') and ligacao_likes.status_id = 1');
        return redirect('home');
      }
      return redirect('home');
    }

    public function getProduto($id){
      // $produto = DB::table('cad_produto')->where('produto_id', $id)->get();
      $produto = DB::select('SELECT * FROM cad_produto INNER JOIN usuarios ON cad_produto.usuario_id = usuarios.usuario_id WHERE cad_produto.produto_id ='.$id);
      return response()->json($produto);
    }

    public function busca(Request $req){
      $busca = DB::table('cad_produto')->where('nome', 'like', '%'.$req->input('busca').'%')->orWhere('descricao', 'like', '%'.$req->input('busca').'%')->get();
      return view('home', ["produtos"=>$busca]);
    }

}
