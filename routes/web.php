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

// Route::get('/', function () {
//     return view('welcome');
// });
// route to  system views
Route::get('/computer', 'ClientController@index');
Route::get('/peripherals','PeripheralsController@index');
Route::get('/storage', 'StorageperipheralsController@index');
Route::get('/server','ServerController@index');
Route::get('/network', 'NetworkdeviceController@index');
Route::get('/ns', 'NetworkedstorageController@index');
Route::get('/ups', 'UpsController@index');
// room automation script by Nongnapat
Route::get('/rooms', function() {
    $rooms = \App\Room::with(['location' => function($query) {
                            $query->with('building');
                        }])
                        ->where('name', 'like', '%' . request()->input('name') . '%')
                        ->get();
    return $rooms;
});
//database operations
Route::post('/store', 'SectionController@store');
Route::post('/add-networkdev','Networkdevicecontroller@store');
Route::get('/networkdevices/{id}', 'NetworkdeviceController@edit');
Route::put('/networkdevices/{id}', 'NetworkdeviceController@update');
Route::post('/add-ups',"UpsController@store");
Route::get('/ups/{id}', 'Upscontroller@edit');
Route::put('/ups/{id}', 'Upscontroller@update');
Route::post('/add-ns','NetworkedstorageController@store');
Route::get('/networkedstorage/{id}', 'Networkedstoragecontroller@edit');
Route::put('/networkedstorage/{id}', 'Networkedstoragecontroller@update');
Route::post('/add-server','ServerController@store');
//under development
Route::get('/admin', 'SectionController@index');
Route::post('/add-computer', 'ClientController@store');
Route::post('/add-sp','StorageperipheralsController@store');
Route::post('/add-peripheral','PeripheralsController@store');
//Route::patch('/add-peripheral', 'PeripheralsController@update');
Route::get('/search', 'SearchController@index');
Route::get('/index', 'IndexController@index');
