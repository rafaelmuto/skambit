<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function main(){
      return view('home');
    }

    public function faqs(){
      return view('faqs');
    }
}
