<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class cadastroUsuario extends Controller
{
  public function listar(){ // mudar para private
    return DB::select('SELECT * FROM usuarios');
  }

  public function getInfo($id){
    $query = DB::select('SELECT * FROM usuarios WHERE usuario_id='.$id);
    return $query;
  }

  public function login(Request $req){
    $login = $req->input('login');
    $senha = $req->input('senha');
    $lista = $this->listar();
    foreach ($lista as $key => $item) {
      if($item->login==$login){
        if(password_verify($senha,$item->senha)){
          $req->session()->put('usuario_id', $item->usuario_id);
          $req->session()->put('login', $item->login);
          $req->session()->put('primeiro_nome', $item->primeiro_nome);
          $req->session()->put('ultimo_nome', $item->ultimo_nome);
          $req->session()->put('email', $item->email);
          $req->session()->put('cep', $item->cep);
          $req->session()->put('avatar', $item->avatar);
          return view('skambit',["login"=>$req->session()->get('login')]);
        }
      }
    }
    return FALSE;
  }

}
