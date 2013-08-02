<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'PublicController@showHome');
Route::get('anjung', 'PublicController@showHome');
Route::get('anjung/logmasuk', 'PublicController@showLogin');
Route::get('anjung/logkeluar','PublicController@processLogout');
Route::get('anjung/pengguna/daftar','PublicController@showDaftarPengguna');

Route::get('anjung/pengenalan','PublicController@viewPengenalan');
Route::get('anjung/objektif','PublicController@viewObjektif');
Route::get('anjung/penganjur','PublicController@viewPenganjur');
Route::get('anjung/tarikh','PublicController@viewTarikh');
Route::get('anjung/yuran','PublicController@viewYuran');
Route::get('anjung/syarat','PublicController@viewSyarat');
Route::get('anjung/format','PublicController@viewFormat');
Route::get('anjung/pembentangan','PublicController@viewPembentangan');
Route::get('anjung/panel','PublicController@viewPanel');
Route::get('anjung/tentatif','PublicController@viewTentatif');
Route::get('anjung/penerbitan','PublicController@viewPenerbitan');
Route::get('anjung/penjurian','PublicController@viewPenjurian');
Route::get('anjung/hubungikami','PublicController@viewHubungikami');


Route::get('anjung/penyelaras/pengguna','RegisteredController@listUser');

Route::post('anjung/logmasuk', 'PublicController@processLogin');
Route::post('anjung/pengguna/daftar','PublicController@processDaftarPengguna');

Route::get('anjung/abstrak','RegisteredController@showAbstract');
Route::get('anjung/penyelaras/abstrak','RegisteredController@listAbstractPenyelaras');
Route::get('anjung/penyelaras/abstrak/{id}','RegisteredController@viewAbstractPenyelaras');
Route::get('anjung/penyelaras/abstrak/sah/{id}','RegisteredController@processAbstractPenyelarasSah');

Route::post('anjung/abstrak/save', 'RegisteredController@saveAbstract');
Route::post('anjung/abstrak/rujukan/save', 'RegisteredController@saveAbstractRujukan');
Route::post('anjung/abstrak/proof/save', 'RegisteredController@saveProof');


Route::filter('before', function()
{
	
	// Do stuff before every request to your application...
	//if (Auth::guest()) return Redirect::to('logmasuk');
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	 if (!Auth::check()) {
        // Stores current url on session and redirect to login page
       // Session::put('redirect', URL::full());
        return Redirect::to('anjung/logmasuk');
    }
   // if ($redirect = Session::get('redirect')) {
   //     Session::forget('redirect');
  //      return Redirect::to($redirect);
  //  }
});