<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\offerTrait;

class NewC extends Controller
{

    use offerTrait;

    public function showNew()
    {

        return 'new';
    }

    public function getoffer()
    {

        return Offer::select('id', 'name')->get();
    }
//adding static offer
    public function createoffer()
    {

        Offer::create([
            'name' => 'baseem',
            'price' => '300',
            'photo' => 'dfdfd',
        ]);


    }

    public function create()
    {

        return view('offer');
    }
////add new offer with image
    public function store(OfferRequest $request)
    {


            //save image


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
            'image'=> $file_name,
            'name' => $request->name,
            'price' => $request->price,
            'photo' => $request->photo,
        ]);
        return redirect()->back()->with(['success' => 'added successfully']);
    }
//show all offers
    public function getall()
    {

        $offers = Offer::select('id', 'name', 'price', 'photo')->get();
        return view('all', compact('offers'));
    }
/////bring the info for updating
    public function editOffer($offer_id)
    {

        // Offer::FindOrFail($offer_id);
        $offer = Offer::find($offer_id);
        if (!$offer) {

            return redirect()->back();
        }
        $offer = Offer::select('id','name', 'price', 'photo')->find($offer_id);
        return view('edit', compact('offer'));


    }

    //update offer
    public function updateOffer(OfferRequest $request,$offer_id)
    {

        $offer = Offer::find($offer_id);
        if (!$offer) {

            return redirect()->back();
        }
        $offer->update($request ->all());
        return redirect()->back()->with(["successs"=>"done"]);
    }

    //delete offer
    public function deleteoffer($offer_id){
        $offer=Offer::find($offer_id);
        if (!$offer) {
            return redirect()->back();}
            $offer->delete();
            return redirect()->route('offer.all')->with(["error"=>"offer has deleted"]);


    }


    public function getvideo(){
       $vidoe= Video::first();
       event(new VideoViewer($vidoe));//fire the event
        return view('video') ->with('video', $vidoe);
    }

}
