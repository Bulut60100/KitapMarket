<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/','front\indexController@index' );
Route::get('/kitap/detay/{selflink}','front\kitap\indexController@index')->name('kitap.detay');
Route::get('/sepet/add/{id}','front\sepet\indexController@add')->name('sepet.add');
Route::get('/sepet/remove/{id}','front\sepet\indexController@remove')->name('sepet.remove');
Route::get('/sepet/flush','front\sepet\indexController@flush')->name('sepet.flush');
Route::get('/sepet/complete','front\sepet\indexController@complete')->name('sepet.complete')->middleware(['auth']);
Route::post('/sepet/complete','front\sepet\indexController@completeStore')->name('sepet.completeStore')->middleware(['auth']);
Route::get('/sepet','front\sepet\indexController@index')->name('sepet.index');
Route::get('/kategori/{selflink}','front\cat\indexController@index')->name('cat');
Route::get('/search','front\search\indexController@index')->name('search');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('front.index');
})->name('dashboard');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.', 'middleware'=>['auth','AdminCtrl']],function(){
    Route::get('/','indexController@index')->name('index');

    Route::group(['namespace'=>'yayinevi','prefix'=>'yayinevi','as'=>'yayinevi.'],function(){
        Route::get('/','indexController@index')->name('index');
        Route::get('/ekle','indexController@create')->name('create');
        Route::post('/ekle','indexController@store')->name('create.post');
        Route::get('/duzenle/{id}','indexController@edit')->name('edit');
        Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
        Route::get('/sil/{id}','indexController@delete')->name('delete');
    });
    Route::group(['namespace'=>'yazar','prefix'=>'yazar','as'=>'yazar.'],function(){
        Route::get('/','indexController@index')->name('index');
        Route::get('/ekle','indexController@create')->name('create');
        Route::post('/ekle','indexController@store')->name('create.post');
        Route::get('/duzenle/{id}','indexController@edit')->name('edit');
        Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
        Route::get('/sil/{id}','indexController@delete')->name('delete');
    });
    Route::group(['namespace'=>'kitap','prefix'=>'kitap','as'=>'kitap.'],function(){
        Route::get('/','indexController@index')->name('index');
        Route::get('/ekle','indexController@create')->name('create');
        Route::post('/ekle','indexController@store')->name('create.post');
        Route::get('/duzenle/{id}','indexController@edit')->name('edit');
        Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
        Route::get('/sil/{id}','indexController@delete')->name('delete');
    });
    Route::group(['namespace'=>'kategori','prefix'=>'kategori','as'=>'kategori.'],function(){
        Route::get('/','indexController@index')->name('index');
        Route::get('/ekle','indexController@create')->name('create');
        Route::post('/ekle','indexController@store')->name('create.post');
        Route::get('/duzenle/{id}','indexController@edit')->name('edit');
        Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
        Route::get('/sil/{id}','indexController@delete')->name('delete');
    });
    Route::group(['namespace'=>'slider','prefix'=>'slider','as'=>'slider.'],function(){
        Route::get('/','indexController@index')->name('index');
        Route::get('/ekle','indexController@create')->name('create');
        Route::post('/ekle','indexController@store')->name('create.post');
        Route::get('/duzenle/{id}','indexController@edit')->name('edit');
        Route::post('/duzenle/{id}','indexController@update')->name('edit.post');
        Route::get('/sil/{id}','indexController@delete')->name('delete');
    });
    Route::group(['namespace'=>'order','prefix'=>'order','as'=>'order.'],function(){
        Route::get('/','indexController@index')->name('index');
        Route::get('/ekle','indexController@create')->name('create');
        Route::post('/ekle','indexController@store')->name('create.post');
        Route::get('/detail/{id}','indexController@detail')->name('detail');
        Route::get('/sil/{id}','indexController@delete')->name('delete');
    });
});

