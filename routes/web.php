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
    return view('welcome'); // this refers to the welcome.blade.php document
});

Route::get('/about', function () {
    return view('about'); // this refers to the about.blade.php document
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::post('/users/{id}', 'UsersController@update')->name('users.update');
Route::get('/users/destroy/{id}', 'UsersController@destroy')->name('users.destroy');

Route::get('/systems/edit/{id}', 'SystemsController@edit')->name('systems.edit');
Route::post('/systems/{id}', 'SystemsController@update')->name('systems.update');

Route::get('/plants', 'PlantsController@index')->name('plants');
Route::get('/plants/create', 'PlantsController@create')->name('plants.create');
Route::post('/plants/store', 'PlantsController@store')->name('plants.store');
Route::get('/plants/edit/{id}', 'PlantsController@edit')->name('plants.edit');
Route::post('/plants/{id}', 'PlantsController@update')->name('plants.update');
Route::get('/plants/destroy/{id}', 'PlantsController@destroy')->name('plants.destroy');

Route::get('/planttypes', 'PlantTypesController@index')->name('planttypes');
Route::get('/planttypes/create', 'PlantTypesController@create')->name('planttypes.create');
Route::post('/planttypes/store', 'PlantTypesController@store')->name('planttypes.store');
Route::get('/planttypes/edit/{id}', 'PlantTypesController@edit')->name('planttypes.edit');
Route::post('/planttypes/{id}', 'PlantTypesController@update')->name('planttypes.update');
Route::get('/planttypes/destroy/{id}', 'PlantTypesController@destroy')->name('planttypes.destroy');

Route::get('/rooms', 'RoomsController@index')->name('rooms');
Route::get('/rooms/create', 'RoomsController@create')->name('rooms.create');
Route::post('/rooms/store', 'RoomsController@store')->name('rooms.store');
Route::get('/rooms/edit/{id}', 'RoomsController@edit')->name('rooms.edit');
Route::post('/rooms/{id}', 'RoomsController@update')->name('rooms.update');
Route::get('/rooms/destroy/{id}', 'RoomsController@destroy')->name('rooms.destroy');

Route::get('/notes/{entity}/{entityID}', 'NotesController@index')->name('notes.index');
Route::get('/notes/{entity}/{entityID}/create', 'NotesController@create')->name('notes.create');
Route::post('/notes/store', 'NotesController@store')->name('notes.store');
Route::get('/note/edit/{id}', 'NotesController@edit')->name('note.edit'); // "notes" caused a problem; per Dave, adjust code from "notes" to "note"
Route::post('/notes/{id}', 'NotesController@update')->name('notes.update');
Route::get('/notes/{entity}/{entityID}/destroy/{id}', 'NotesController@destroy')->name('notes.destroy');

Route::get('/community', 'CommunityController@index')->name('community.index');
