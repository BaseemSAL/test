<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FirstController extends Controller
{

    public function showString()
    {
        $data=[];
        $data['id']=5;
        $data['name']='baseem';

        $obj= new \stdClass();
        $obj -> name = 'baseem';
        $obj -> id =4;

        return view('welcome',compact('obj'));

    }
}
