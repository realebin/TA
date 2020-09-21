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
// Route::post('/createSeminar','SeminarController@store');
Route::get('/about','PageController@about');
// Route::get('/seminar','SeminarController@index'); 
// Route::post('/seminar','SeminarController@store');
Route::get('/sertifikat','PageController@sertifikat');
Route::get('/create','PageController@create');
Route::get('/', function () {
    if (Auth::check())
    {
        // Route::get('/home', 'HomeController@index')->name('home');
        return view('/home');
    } else {
        return view('/auth.login');
        // Route::get('/', 'PageController@login');
    }
   
});
/////////////////////////user///////////////////////////
// Route::get('/user','UserController@index');
// Route::get('/user/create','UserController@create');
// Route::post('/user','UserController@store');
// Route::get('/user/{id}','UserController@show');
// Route::delete('/user/{user}','UserController@destroy');
// Route::get('/user/{user}/edit','UserController@edit');
// Route::patch('/user/{user}','UserController@update');
// Route::resource('user','UserController');
// Route::resource('seminar','SeminarController');
Route::resources([
    'user' => 'UserController',
    'seminar' => 'SeminarController', 
    'topik' =>'TopikController',
]);
Route::post('/profile/{user}','UserController@edit');
Route::get('/profile/{id}','UserController@profile');
Route::get('/profile/{user}/edit','UserController@edit');
Route::patch('/profile/{id}','UserController@update');
Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
