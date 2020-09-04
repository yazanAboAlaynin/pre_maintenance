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

Auth::routes();

Route::get('/home', 'HomeController@chooseVehicle')->name('home');
Route::get('/choose/vehicle', 'HomeController@chooseVehicle')->name('choose');
Route::get('/show/vehicle', 'HomeController@showVehicle')->name('show.vehicle');
Route::get('/show/part', 'HomeController@showPart')->name('show.part');
Route::get('/getmake', 'HomeController@getMake')->name('getMake');
Route::get('/getyear', 'HomeController@getYear')->name('getYear');
Route::get('/parts/{vehicle}', 'HomeController@parts')->name('parts');

Route::get('/add/question', 'HomeController@addQuestion')->name('add.question');
Route::post('/store/question', 'HomeController@storeQuestion')->name('store.question');
Route::get('/questions', 'HomeController@questions')->name('questions');

Route::get('question/{question}/answers', 'HomeController@questionAnswers')->name('question.answers');
Route::post('/store/answer', 'HomeController@storeAnswer')->name('store.answer');

Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function() {
    Auth::routes(['register' => false]);

    Route::get('/register', 'auth\RegisterController@index')->name('register');
    Route::post('/create', 'auth\RegisterController@register')->name('create');

    Route::get('/home', 'AdminController@index')->name('home');
    Route::get('/add/vehicle', 'AdminController@addVehicle')->name('add.vehicle');
    Route::post('/store/vehicle', 'AdminController@storeVehicle')->name('store.vehicle');

    Route::get('vehicle/{vehicle}/add/part', 'AdminController@addPart')->name('add.part');
    Route::post('/store/part/{vehicle}', 'AdminController@storePart')->name('store.part');

    Route::get('/vehicles', 'AdminController@vehicles')->name('vehicles');
    Route::post('/vehicle/{id}/edit', 'AdminController@vehicleEdit')->name('vehicle.edit');
    Route::get('/vehicle/{id}/update', 'AdminController@updateVehicle')->name('vehicle.update');
    Route::get('/vehicle/delete', 'AdminController@deleteVehicle')->name('vehicle.delete');

    Route::get('/vehicle/{id}/parts', 'AdminController@vehicleParts')->name('vehicle.parts');
    Route::get('/part/{id}/update', 'AdminController@partUpdate')->name('part.update');
    Route::post('/part/{id}/edit', 'AdminController@partEdit')->name('part.edit');
    Route::get('/part/delete', 'AdminController@deletePart')->name('part.delete');
});
