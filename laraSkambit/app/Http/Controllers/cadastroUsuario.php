<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class cadastroUsuario extends Controller
{

  public function getInfo($id){
    $query = DB::select('SELECT * FROM usuarios WHERE usuario_id='.$id);
    return $query;
  }

  public function login(Request $req){
    $login = $req->input('login');
    $senha = $req->input('senha');
    $lista = DB::table('usuarios')->get();
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
          return view('home',["login"=>$req->session()->get('login')]);
        }
      }
    }
    return redirect('home?msg=error_login');
  }

  public function logout(Request $req){
    $req->session()->flush();
    return redirect('home');
  }

  public function add(Request $req){
    if($req->isMethod('GET')){
      return view('cadUsuario');
    }
    if($req->input('senha')!=$req->input('conf_senha')){
      return redirect('cadUsuario?msg=error_senhas_nao_conferem');
    }
    $usuarios = DB::table('usuarios')->get();
    foreach($usuarios as $usuario){
      if($usuario->login == $req->input('login')){
        return redirect('cadUsuario?msg=error_login_ja_existe');
      }
    }
    $avatar = $this->setAvatar();
    $senha = password_hash($req->input('senha'), PASSWORD_DEFAULT);
    DB::table('usuarios')->insert(['primeiro_nome'=>$req->input('primeiro_nome'),
                                   'ultimo_nome'=>$req->input('ultimo_nome'),
                                  'cep'=>$req->input('cep'),
                                  'login'=>$req->input('login'),
                                  'senha'=>$senha, 'avatar'=>$avatar,
                                  'email'=>$req->input('email'),
                                  'status_id'=>1,
                                  'rating'=>5
                                ]);


    return view('home');
  }

  private function setAvatar(){
    if(!is_dir("avatares/")){
      mkdir("avatares/");
    }
    if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"]==UPLOAD_ERR_OK){
      $timestamp = date("YmdHis");
      $file_ext = explode(".", strtolower($_FILES["avatar"]["name"]));
      $file_name = $timestamp.".". $file_ext[1];
      $file = $_FILES["avatar"]["tmp_name"];
      move_uploaded_file($file, "avatares/".$file_name);
      return "avatares/".$file_name;
    }
    else{
      return FALSE;
    }
  }



}
