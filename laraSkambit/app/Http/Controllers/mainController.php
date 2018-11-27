<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function main(Request $req){
      if($req->session() !== null){
        $lista = DB::table('cad_produto')->select()->where('usuario_id','!=', $req->session()->get('usuario_id'))->get();
      }
      else {
        $lista = DB::table('cad_produto')->select()->get();
      }
      return view('home',["produtos"=>$lista]);
    }

    public function faqs(){
      return view('faqs');
    }

    public function like($produto_id,Request $req){
      DB::table('ligacao_likes')->insert(["usuario_id"=>$req->session()->get('usuario_id'),"produto_id"=>$produto_id, "status_id"=>1]);
      return redirect('home');
    }
}
