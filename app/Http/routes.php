<?php
// Route::get('/_debugbar/assets/stylesheets', [
//     'as' => 'debugbar-css',
//     'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@css'
// ]);
//
// Route::get('/_debugbar/assets/javascript', [
//     'as' => 'debugbar-js',
//     'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@js'
// ]);

// Route::group(['middleware' => ['web']], function () {
//     Route::controller('auth','Auth\AuthController');
//
//     Route::group(['middleware' => ['auth']], function () {
//       Route::controller('/main','MainController');
Route::controller('/','AlchemistController');
//
//       Route::group(['middleware'=>['menter']],function(){
//         Route::controller('register','Auth\RegisterController');
//       });
//
//     });
// });



Route::get('/home', 'HomeController@index');
