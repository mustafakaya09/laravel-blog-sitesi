<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\Homepage;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\PageController;
//use App\Http\Controllers\Back\ArticleController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::get('site-bakimda', function(){
  return view('front.offline');
});

//Route::get('admin/panel','Back\Dashboard@index')->name('admin.dashboard');
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){
  Route::get('giris',[AuthController::class,'login'])->name('login');
  Route::post('giris',[AuthController::class,'loginPost'])->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
  Route::get('panel',[Dashboard::class,'index'])->name('dashboard');
  // MAKALE ROUTE'S
  Route::get('makaleler/silinenler','App\Http\Controllers\Back\ArticleController@trashed')->name('trashed.article');
  Route::resource('makaleler','App\Http\Controllers\Back\ArticleController');
  Route::get('/switch', 'App\Http\Controllers\Back\ArticleController@switch')->name('switch');
  Route::get('/deletearticle/{id}', 'App\Http\Controllers\Back\ArticleController@delete')->name('delete.article');
  Route::get('/harddeletearticle/{id}', 'App\Http\Controllers\Back\ArticleController@hardDelete')->name('hard.delete.article');
  Route::get('/recoverarticle/{id}', 'App\Http\Controllers\Back\ArticleController@recover')->name('recover.article');
  // CATEGORY ROUT'S
  Route::get('/kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
  Route::post('/kategoriler/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
  Route::post('/kategoriler/update','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
  Route::post('/kategoriler/delete','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
  Route::get('/kategori/status','App\Http\Controllers\Back\CategoryController@switch')->name('category.switch');
  Route::get('/kategori/getData','App\Http\Controllers\Back\CategoryController@getData')->name('category.getdata');
  // PAGE ROUTE'S
  Route::get('/sayfalar',[PageController::class, 'index'])->name('page.index');
  Route::get('/sayfalar/olustur',[PageController::class, 'create'])->name('page.create');
  Route::get('/sayfalar/guncelle/{id}','App\Http\Controllers\Back\PageController@update')->name('page.edit');
  Route::post('/sayfalar/guncelle/{id}','App\Http\Controllers\Back\PageController@updatePost')->name('page.edit.post');
  Route::post('/sayfalar/olustur',[PageController::class, 'post'])->name('page.create.post');
  Route::get('/sayfa/switch', 'App\Http\Controllers\Back\PageController@switch')->name('page.switch');
  Route::get('/sayfa/sil/{id}','App\Http\Controllers\Back\PageController@delete')->name('page.delete');
  Route::get('/sayfa/siralama',[PageController::class, 'orders'])->name('page.orders');
  // CONFIG ROOT'S
  Route::get('/ayarlar', 'App\Http\Controllers\Back\ConfigController@index')->name('config.index');
  Route::post('/ayarlar/update', 'App\Http\Controllers\Back\ConfigController@update')->name('config.update');
  //
  Route::get('cikis',[AuthController::class, 'logout'])->name('logout');
});




/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Route::get('/',[Homepage::class,'index'])->name('homepage');
Route::get('sayfa',[Homepage::class,'index']);
Route::get('/iletisim',[Homepage::class,'contact'])->name('contact');
Route::post('/iletisim',[Homepage::class,'contactpost'])->name('contact.post');
Route::get('/kategori/{category}',[Homepage::class,'category'])->name('category');
Route::get('/{category}/{slug}',[Homepage::class,'single'])->name('single');
Route::get('/{sayfa}',[Homepage::class,'page'])->name('page');

/*
Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('sayfa','App\Http\Controllers\Front\Homepage@index');
Route::get('/iletisim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletisim','App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}','App\Http\Controllers\Front\Homepage@page')->name('page');
*/
