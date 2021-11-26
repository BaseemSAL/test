<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function admin(){
        return view('admin');

    }
    public function site(){
        return view('site');

    }

}
