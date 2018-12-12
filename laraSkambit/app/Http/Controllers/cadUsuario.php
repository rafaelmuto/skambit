<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Cookie;

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
          // Cookie::make('login','true');
          return redirect('home');
        }
      }
    }
    return redirect('home?msg=error_login');
  }

  public function logout(Request $req){
    $req->session()->flush();
    // Cookie::forget('login');
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
    return redirect('home');
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
    $usuario_id = $req->session()->get('usuario_id');

    $meusProdutos = DB::table('cad_produto')->where('usuario_id', $usuario_id)->where('status_id',1)->get();

    $meusLikes = DB::table('cad_produto')->join('ligacao_likes', 'cad_produto.produto_id', '=', 'ligacao_likes.produto_id')->where('ligacao_likes.usuario_id', $usuario_id)->where('ligacao_likes.status_id', 1)->get();

    $meusMatchs = $this->meusMatchs($usuario_id);

    if($req->isMethod('GET')){
      return view('upUsuario',["meusProdutos"=>$meusProdutos, "meusLikes"=>$meusLikes, "meusMatchs"=>$meusMatchs]);
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

    return view('upUsuario',["meusProdutos"=>$meusProdutos, "meusLikes"=>$meusLikes, "meusMatchs"=>$meusMatchs]);
  }

  // FUNCAO RETORNA ARRAY ORGANIZADA POR USUARIO_ID E OS PRODUTOS QUE FORAM ENVOLVIDOS NO MATCH.... wtf funcionou.... o______o
  public function meusMatchs($usuario_id){
    $matchUsers = DB::table('ligacao_matches')->where('usuario_id',$usuario_id)->get()[0]->match_list;
    $matchUsers = explode(',',$matchUsers);
    foreach ($matchUsers as $matchUser) {
      $produtos[$matchUser]['usuario'] = $this->getInfo($matchUser)[0];
      $produtos[$matchUser]['meusProdutos'] = $this->getMatchlist($usuario_id, $matchUser);
      $produtos[$matchUser]['meusLikes'] = $this->getMatchlist($matchUser, $usuario_id);
    }
    // var_dump('<pre>', $produtos);
    return $produtos;
  }

  // FUNCAO DEVOLVE OS PRODUTOS MATCHEADOS DO USUARIO_A PELO USUARIO_B (o B deu like no A!!)
  public function getMatchlist($user_A, $user_B){
    $produtos = DB::select('SELECT ligacao_likes.like_id, ligacao_likes.usuario_id AS userL_id, cad_produto.* FROM ligacao_likes JOIN cad_produto ON ligacao_likes.produto_id = cad_produto.produto_id WHERE ligacao_likes.usuario_id = '.$user_B.' AND ligacao_likes.status_id = 1 AND cad_produto.usuario_id = '.$user_A.' AND cad_produto.status_id = 1');
    return $produtos;
  }

  public function match($user_a,$user_b){
    // LIKES AB = likes do usuario A nos produtos do usuario B
    $likesAB = DB::select('SELECT ligacao_likes.like_id, ligacao_likes.usuario_id AS userL_id, cad_produto.* FROM ligacao_likes JOIN cad_produto ON ligacao_likes.produto_id = cad_produto.produto_id WHERE ligacao_likes.usuario_id = '.$user_a.' AND ligacao_likes.status_id = 1 AND cad_produto.usuario_id = '.$user_b.' AND cad_produto.status_id = 1');
    // LIKES BA = likes do usuario B nos produtos do usuario A
    $likesBA = DB::select('SELECT ligacao_likes.like_id, ligacao_likes.usuario_id AS userL_id, cad_produto.* FROM ligacao_likes JOIN cad_produto ON ligacao_likes.produto_id = cad_produto.produto_id WHERE ligacao_likes.usuario_id = '.$user_b.' AND ligacao_likes.status_id = 1 AND cad_produto.usuario_id = '.$user_a.' AND cad_produto.status_id = 1');
    if( sizeof($likesAB)>0 && sizeof($likesBA)>0){
      $matchList = ["meusLikes"=>$likesAB, "meusProdutos"=>$likesBA];
      return $matchList;
    }
    return false;
  }


}
