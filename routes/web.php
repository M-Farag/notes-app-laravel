<?php

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

Route::resource('notes','NotesController');

//HintsUpdate
Route::patch('hints/{hint}','NotesHintsController@update');
//add new hint
Route::post('/notes/{note}/hint','NotesHintsController@store');

//service container 
//inject a new toy
	//app()->bind('App\Example',function(){
	// return new \App\Example();
	// }); 

	//twitter api-key-test
	// app()->singleton('twitterKey',function(){
	// 	return new \App\Services\Twitter('Munchy-Key-Here');
	// });

// Route::get('/app',function(){
// dd(app('App\Example'),app('twitterKey'));
// });

Route::get('/app',function(){
	dd(app('twitter'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
