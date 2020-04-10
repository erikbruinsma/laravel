<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

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
Route::group(['middleware' => 'cacheable'], function () {
  Route::get('/', function () {
      return dd(App\Users::all());

  });
  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/views', function () {
       $visits = Redis::incr('visits');
       return $visits;
  });

});

Auth::routes();


Route::get('upload', function() {
    $files = Storage::disk('spaces')->files('uploads');

    return view('upload', compact('files'));
});

Route::post('upload', function() {
    Storage::disk('spaces')->putFile('uploads', request()->file, 'public');

    return redirect()->back();
});
