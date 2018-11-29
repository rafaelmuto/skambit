<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function main(Request $req){
      if($req->session() !== null){
        // ->leftJoin('ligacao_likes','cad_produto.usuario_id','=','ligacao_likes.usuario_id')->where('ligacao_likes.usuario_id', null)
        // $lista = DB::table('cad_produto')->where('cad_produto.usuario_id','!=', $req->session()->get('usuario_id'))->where('cad_produto.status_id',1)->get(); original
        $lista = DB::table('cad_produto')->where('cad_produto.usuario_id','!=', $req->session()->get('usuario_id'))->where('cad_produto.status_id',1)->get();
      }
      else {
        $lista = DB::table('cad_produto')->select()->where('status_id',1)->get();
      }
      return view('home',["produtos"=>$lista]);
    }

    public function faqs(){
      return view('faqs');
    }

    public function like($produto_id,Request $req){
      if($req->session()->get('usuario_id') !== null){
        DB::table('ligacao_likes')->insert(["usuario_id"=>$req->session()->get('usuario_id'),"produto_id"=>$produto_id, "status_id"=>1]);
        return redirect('home');
      }
      return redirect('home');
    }
}
