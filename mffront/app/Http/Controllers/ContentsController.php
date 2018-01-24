<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentsController extends Controller
{
    //

    public function __construct()
    {
      $this->middleware('guest:admin');
    }
    
    public function home()
  {

    return view('welcome');
  }
}
