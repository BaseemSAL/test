<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-me', function () {
    return view("about");
});

Route::get('/category', function () {

    return view("category",);


});



// group ...prefix .... middleware...namespace
route::group(['prefix' =>'user', 'middleware'=> 'auth','namespace'=>'' ] , function (){
    route::get( '/', function (){
        return 'work';
    });
    route::get( '/ee', function (){
        return 'workee';
    }) -> middleware('auth');
});
route::group(['namespace'=>'App\Http\Controllers\Front'], function (){

  route::get('up','FirstController@showString');

});

route::get('new','App\Http\Controllers\NewC@showNew');
route::get('login',function (){

    return'must be login';
})-> name ('login');

route::resource('news','App\Http\Controllers\NewController');


route::get('fillable','App\Http\Controllers\NewC@getoffer');

route::group(['prefix'=>'offer'],function (){
  // route::get('store','App\Http\Controllers\NewC@createoffer');
   route::get('create','App\Http\Controllers\NewC@create');
    route::post('store','App\Http\Controllers\NewC@store');
    route::get('all','App\Http\Controllers\NewC@getall')->name('offer.all');



    route::get('edit/{offer_id}','App\Http\Controllers\NewC@editOffer');
    route::post('update/{offer_id}','App\Http\Controllers\NewC@updateOffer');
    route::get('delete/{offer_id}','App\Http\Controllers\NewC@deleteoffer')->name('offer.delete') ;
});


route::get('youtube','App\Http\Controllers\NewC@getvideo');


######## begin Ajax route #########

route::group(['prefix'=>'ajax-offer'], function (){

   route::get('create','App\Http\Controllers\formController@create') ;
    route::post('store','App\Http\Controllers\formController@store') ;


});

######## begin Ajax route #########


####### Begin auth ####
route::get('admin','App\Http\Controllers\authController@admin');
route::get('site','App\Http\Controllers\authController@site');


###### End Auth #####

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
