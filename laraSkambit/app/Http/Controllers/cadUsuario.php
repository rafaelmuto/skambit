<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException; //testar depois

class cadUsuario extends Controller
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
          return redirect('home');
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
      if($usuario->email == $req->input('email')){
        return redirect('cadUsuario?msg=error_email_ja_existe');
      }
    }

    $avatar = $this->setAvatar($req->input('login'));
    $senha = password_hash($req->input('senha'), PASSWORD_DEFAULT);
    $id = DB::table('usuarios')->insertGetId(["primeiro_nome"=>$req->input('primeiro_nome'),
                                   "ultimo_nome"=>$req->input('ultimo_nome'),
                                  "cep"=>$req->input('cep'),
                                  "login"=>$req->input('login'),
                                  "senha"=>$senha, 'avatar'=>$avatar,
                                  "email"=>$req->input('email'),
                                  "status_id"=>1,
                                  "rating"=>5
                                ]);
    $req->session()->put('usuario_id', $id);
    $req->session()->put('primeiro_nome', $req->input('primeiro_nome'));
    $req->session()->put('ultimo_nome', $req->input('ultimo_nome'));
    $req->session()->put('cep', $req->input('cep'));
    $req->session()->put('login', $req->input('login'));
    $req->session()->put('email', $req->input('email'));
    $req->session()->put('avatar', $avatar);
    return view('home');
  }

  private function setAvatar($login){
    if(!is_dir("avatares/")){
      mkdir("avatares/");
    }
    if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"]==UPLOAD_ERR_OK){
      $timestamp = date("YmdHis");
      $file_ext = explode(".", strtolower($_FILES["avatar"]["name"]));
      $file_name = $timestamp."_".$login.".". $file_ext[1];
      $file = $_FILES["avatar"]["tmp_name"];
      move_uploaded_file($file, "avatares/".$file_name);
      return "avatares/".$file_name;
    }
    else{
      return false;
    }
  }

  public function update(Request $req){
    if($req->session()->get('usuario_id') == null){
      return redirect('home');
    }

    $meusProdutos = DB::table('cad_produto')->select()->where('usuario_id', $req->session()->get('usuario_id'))->get();
    // $meusLikes = DB::table('cad_produto')->join()
    if($req->isMethod('GET')){
      return view('upUsuario',["meusProdutos"=>$meusProdutos]);
    }

    if($req->input('nova_senha')!=$req->input('conf_nova_senha')){
      return redirect('upUsuario?msg=error_senhas_nao_conferem');
    }

    $id = $req->session()->get('usuario_id');
    $senha_usuario = DB::table('usuarios')->select('senha')->where('usuario_id',$id)->first()->senha;
    if(!password_verify($req->input('senha'),$senha_usuario)){
      return redirect('upUsuario?msg=error_senha_errada');
    }
    $avatar = $this->setAvatar($req->input('login'));
    if($avatar==false){
      $avatar = $req->session()->get('avatar');
    }

    DB::table('usuarios')->where('usuario_id', $req->session()->get('usuario_id'))->update(["primeiro_nome"=>$req->input('primeiro_nome'),
                                                                                            "ultimo_nome"=>$req->input('ultimo_nome'),
                                                                                            "cep"=>$req->input('cep'),
                                                                                            "login"=>$req->input('login'),
                                                                                            "avatar"=>$avatar,
                                                                                            "email"=>$req->input('email')
                                                                                          ]);
    if($req->input('nova_senha')!=''){
      DB::table('usuarios')->where('usuario_id', $req->session()->get('usuario_id'))->update(["senha"=>password_hash($req->input('nova_senha'),PASSWORD_DEFAULT)]);
    }
    $req->session()->put('primeiro_nome', $req->input('primeiro_nome'));
    $req->session()->put('ultimo_nome', $req->input('ultimo_nome'));
    $req->session()->put('cep', $req->input('cep'));
    $req->session()->put('login', $req->input('login'));
    $req->session()->put('email', $req->input('email'));
    $req->session()->put('avatar', $avatar);
    return view('upUsuario',["meusProdutos"=>$meusProdutos]);
  }



}
