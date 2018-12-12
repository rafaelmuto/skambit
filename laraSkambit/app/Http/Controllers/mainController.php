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

    public function busca(Request $req){
      $busca = DB::table('cad_produto')->where('nome', 'like', '%'.$req->input('busca').'%')->orWhere('descricao', 'like', '%'.$req->input('busca').'%')->get();
      return view('home', ["produtos"=>$busca]);
    }

    public function dislike($produto_id,Request $req){
      DB::table('ligacao_likes')->where('usuario_id', $req->session()->get('usuario_id'))->where('produto_id', $produto_id)->update(["status_id"=>2]);
      return redirect('upUsuario');
    }

    public function getProduto($id){
      // $produto = DB::table('cad_produto')->where('produto_id', $id)->get();
      $produto = DB::select('SELECT * FROM cad_produto INNER JOIN usuarios ON cad_produto.usuario_id = usuarios.usuario_id WHERE cad_produto.produto_id ='.$id);
      return response()->json($produto);
    }



    public function like($produto_id,Request $req){
      DB::table('ligacao_likes')->insert(["usuario_id"=>$req->session()->get('usuario_id'),"produto_id"=>$produto_id, "status_id"=>1]);

      $usuario_id_produto = DB::select('SELECT usuario_id FROM cad_produto WHERE produto_id = '.$produto_id)[0]->usuario_id;
      $usuario_id = $req->session()->get('usuario_id');

      if($this->deuMatch($usuario_id,$usuario_id_produto)){

        $matchList = $this->getMatchlist($usuario_id);
        if(!in_array($usuario_id_produto,$matchList)){
          $matchList[] = $usuario_id_produto;
          DB::table('ligacao_matches')->where('usuario_id',$usuario_id)->update(['match_list'=>implode(',',$matchList)]);
        }

        $matchList_B = $this->getMatchlist($usuario_id_produto);
        if(!in_array($usuario_id,$matchList_B)){
          $matchList_B[] = $usuario_id;
          DB::table('ligacao_matches')->where('usuario_id',$usuario_id_produto)->update(['match_list'=>implode(',',$matchList_B)]);
        }
      }
    }

    public function deuMatch($user_a,$user_b){
      // $likesAB = DB::select('SELECT ligacao_likes.like_id, ligacao_likes.usuario_id AS userL_id, cad_produto.* FROM ligacao_likes JOIN cad_produto ON ligacao_likes.produto_id = cad_produto.produto_id WHERE ligacao_likes.usuario_id = '.$user_a.' AND ligacao_likes.status_id = 1 AND cad_produto.usuario_id = '.$user_b.' AND cad_produto.status_id = 1');
      $likesBA = DB::select('SELECT ligacao_likes.like_id, ligacao_likes.usuario_id AS userL_id, cad_produto.* FROM ligacao_likes JOIN cad_produto ON ligacao_likes.produto_id = cad_produto.produto_id WHERE ligacao_likes.usuario_id = '.$user_b.' AND ligacao_likes.status_id = 1 AND cad_produto.usuario_id = '.$user_a.' AND cad_produto.status_id = 1');
      if(sizeof($likesBA)>0){
        return true;
      }
      return false;
    }

    public function getMatchlist($usuario_id){
      $matchList = DB::select('SELECT ligacao_matches.match_list FROM ligacao_matches WHERE ligacao_matches.usuario_id = '.$usuario_id);
      if($matchList != null){
        $matchList = explode(',',$matchList[0]->match_list);
        return $matchList;
      }
      DB::table('ligacao_matches')->insert(["usuario_id"=>$usuario_id, "match_list"=>'',"status_id"=>1]);
      return [];
    }

}
