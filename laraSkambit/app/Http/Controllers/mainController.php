<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function main(Request $req){
      if($req->session()->get('usuario_id') !== null){
        // ORIGINAL: $lista = DB::table('cad_produto')->where('cad_produto.usuario_id','!=', $req->session()->get('usuario_id'))->where('cad_produto.status_id',1)->get();

        // QUERY DO VINI: SELECT * FROM cad_produto WHERE cad_produto.usuario_id != 3 and cad_produto.produto_id not in (SELECT ligacao_likes.produto_id from ligacao_likes WHERE ligacao_likes.produto_id = cad_produto.produto_id)

        $lista = DB::select('SELECT * FROM cad_produto WHERE cad_produto.usuario_id != '. $req->session()->get('usuario_id') .' and cad_produto.produto_id not in (SELECT ligacao_likes.produto_id from ligacao_likes WHERE ligacao_likes.produto_id = cad_produto.produto_id) AND cad_produto.status_id = 1');
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
      //SELECT * from ligacao_likes WHERE usuario_id = (SELECT cad_produto.usuario_id FROM cad_produto WHERE cad_produto.produto_id = 17) and EXISTS (SELECT * from cad_produto WHERE cad_produto.usuario_id = 3) and ligacao_likes.status_id = 1
      if($req->session()->get('usuario_id') !== null){
        DB::table('ligacao_likes')->insert(["usuario_id"=>$req->session()->get('usuario_id'),"produto_id"=>$produto_id, "status_id"=>1]);
        $matches = DB::select('SELECT * from ligacao_likes WHERE usuario_id = (SELECT cad_produto.usuario_id FROM cad_produto WHERE cad_produto.produto_id ='. $produto_id .') and EXISTS (SELECT * from cad_produto WHERE cad_produto.usuario_id = '. $req->session()->get('usuario_id') .') and ligacao_likes.status_id = 1');
        // return redirect('home',["matches"=>$matches]);
        return var_dump($matches);
      }
      return redirect('home');
    }
}
