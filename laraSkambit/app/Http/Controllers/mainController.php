<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function main(){
      $time = date('Y-m-d');
      return view('skambit', ['time'=>$time]);
    }
}
