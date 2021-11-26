<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Traits\offerTrait;
use Illuminate\Http\Request;

class formController extends Controller
{
    use offerTrait;

    public function create(){
//view form to add offer
        return view('createAjax');

    }

    public function store($request){

        //save offer into DB using Ajax

        $file_name=  $this-> saveimage($request->image,'images/offers');
        /* $rule= ['name'=>'required',
              'price'=>'required|numeric',
              'photo'=>'required'];

          $messages=[
              'name.required'=>'Enter Name Please',
              'price.required'=>'Enter Price Please',
              'price.numeric'=>'price must be a number'];

         $validator= validator($request->all(),$rule,$messages);
  if ($validator->fails()){
      return redirect()->back()->withErrors($validator)->withInput($request->all());
  }*/

        Offer::create([
            //'image'=> $file_name,
            'name' => $request->name,
            'price' => $request->price,
            'photo' => $request->photo,
        ]);
        return redirect()->back()->with(['success' => 'added successfully']);
    }


}
