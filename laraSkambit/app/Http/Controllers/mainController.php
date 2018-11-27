<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function main(){
      $lista = DB::table('cad_produto')->select()->get();

      return view('home',["produtos"=>$lista]);
    }

    public function faqs(){
      return view('faqs');
    }
}
