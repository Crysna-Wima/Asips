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
    return view('home');
});

Route::get('login','App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login','App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout','App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['cek_login:admin']], function() {
        Route::get('admin','App\Http\Controllers\AdminController@index')->name('admin');
    });

    Route::group(['middleware' => ['cek_login:editor']], function() {
        Route::get('editor','App\Http\Controllers\EditorController@index')->name('editor');
    });

    Route::group(['middleware' => ['cek_login:parent']], function() {
        Route::get('parent','App\Http\Controllers\ParentController@index')->name('parent');
    });
});

Route::get('/kecamatan', 'App\Http\Controllers\kecamatanController@index');
Route::post('/kecamatan/store','App\Http\Controllers\kecamatanController@store');
Route::get('/kecamatan/edit/{id}','App\Http\Controllers\kecamatanController@edit');
Route::post('/kecamatan/update','App\Http\Controllers\kecamatanController@update');
Route::get('/kecamatan/hapus/{id}', 'App\Http\Controllers\kecamatanController@hapus');
Route::get('/kecamatan/restore', 'App\Http\Controllers\kecamatanController@restore');
Route::get('/kecamatan/restore/{id}', 'App\Http\Controllers\kecamatanController@back');


Route::get('/kelurahan', 'App\Http\Controllers\kelurahanController@index');
Route::post('/kelurahan/store','App\Http\Controllers\kelurahanController@store');
Route::get('/kelurahan/edit/{id}','App\Http\Controllers\kelurahanController@edit');
Route::post('/kelurahan/update','App\Http\Controllers\kelurahanController@update');
Route::get('/kelurahan/hapus/{id}', 'App\Http\Controllers\kelurahanController@hapus');
Route::get('/kelurahan/restore', 'App\Http\Controllers\kelurahanController@restore');
Route::get('/kelurahan/restore/{id}', 'App\Http\Controllers\kelurahanController@back');


Route::get('/role', 'App\Http\Controllers\roleController@index');
Route::post('/role/store','App\Http\Controllers\roleController@store');
Route::get('/role/edit/{id}','App\Http\Controllers\roleController@edit');
Route::post('/role/update','App\Http\Controllers\roleController@update');
Route::get('/role/hapus/{id}', 'App\Http\Controllers\roleController@hapus');
Route::get('/role/restore', 'App\Http\Controllers\roleController@restore');
Route::get('/role/restore/{id}', 'App\Http\Controllers\roleController@back');


Route::get('/posyandu', 'App\Http\Controllers\posyanduController@index');
Route::post('/posyandu/store','App\Http\Controllers\posyanduController@store');
Route::get('/posyandu/edit/{id}','App\Http\Controllers\posyanduController@edit');
Route::post('/posyandu/update','App\Http\Controllers\posyanduController@update');
Route::get('/posyandu/hapus/{id}', 'App\Http\Controllers\posyanduController@hapus');
Route::get('/posyandu/restore', 'App\Http\Controllers\posyanduController@restore');
Route::get('/posyandu/restore/{id}', 'App\Http\Controllers\posyanduController@back');


Route::get('/balita', 'App\Http\Controllers\balitaController@index');
Route::post('/balita/store','App\Http\Controllers\balitaController@store');
Route::get('/balita/edit/{id}','App\Http\Controllers\balitaController@edit');
Route::post('/balita/update','App\Http\Controllers\balitaController@update');
Route::get('/balita/hapus/{id}', 'App\Http\Controllers\balitaController@hapus');
Route::get('/balita/restore', 'App\Http\Controllers\balitaController@restore');
Route::get('/balita/restore/{id}', 'App\Http\Controllers\balitaController@back');


Route::get('historyPosyandu','App\Http\Controllers\HistoryPosyanduController@index');
Route::post('historyPosyandu/store','App\Http\Controllers\HistoryPosyanduController@store');
Route::get('historyPosyandu/edit/{id}','App\Http\Controllers\HistoryPosyanduController@edit');
Route::post('historyPosyandu/update','App\Http\Controllers\HistoryPosyanduController@update');
Route::get('historyPosyandu/hapus/{id}','App\Http\Controllers\HistoryPosyanduController@hapus');
Route::get('historyPosyandu/restore','App\Http\Controllers\HistoryPosyanduController@restore');
Route::get('historyPosyandu/restore/{id}','App\Http\Controllers\HistoryPosyanduController@back');

Route::get('admins','App\Http\Controllers\adminsController@index');
Route::post('admins/store','App\Http\Controllers\adminsController@store');
Route::get('admins/edit/{id}','App\Http\Controllers\adminsController@edit');
Route::post('admins/update','App\Http\Controllers\adminsController@update');
Route::get('admins/hapus/{id}','App\Http\Controllers\adminsController@hapus');
Route::get('admins/restore','App\Http\Controllers\adminsController@restore');
Route::get('admins/restore/{id}','App\Http\Controllers\adminsController@back');

Route::get('users','App\Http\Controllers\usersController@index');
Route::post('users/store','App\Http\Controllers\usersController@store');
Route::get('users/edit/{id}','App\Http\Controllers\usersController@edit');
Route::post('users/update','App\Http\Controllers\usersController@update');
Route::get('users/hapus/{id}','App\Http\Controllers\usersController@hapus');
Route::get('users/restore','App\Http\Controllers\usersController@restore');
Route::get('users/restore/{id}','App\Http\Controllers\usersController@back');

Route::get('parents','App\Http\Controllers\parentsController@index');
Route::post('parents/store','App\Http\Controllers\parentsController@store');
Route::get('parents/edit/{id}','App\Http\Controllers\parentsController@edit');
Route::post('parents/update','App\Http\Controllers\parentsController@update');
Route::get('parents/hapus/{id}','App\Http\Controllers\parentsController@hapus');
Route::get('parents/restore','App\Http\Controllers\parentsController@restore');
Route::get('parents/restore/{id}','App\Http\Controllers\parentsController@back');

Route::get('/balitauser', 'App\Http\Controllers\balitauserController@index');
Route::post('/balitauser/store','App\Http\Controllers\balitauserController@store');
Route::get('/balitauser/edit/{id}','App\Http\Controllers\balitauserController@edit');
Route::post('/balitauser/update','App\Http\Controllers\balitauserController@update');
Route::get('/balitauser/hapus/{id}', 'App\Http\Controllers\balitauserController@hapus');
Route::get('/balitauser/restore', 'App\Http\Controllers\balitauserController@restore');
Route::get('/balitauser/restore/{id}', 'App\Http\Controllers\balitauserController@back');

Route::get('historyPosyanduuser','App\Http\Controllers\HistoryPosyanduuserController@index');
Route::post('historyPosyanduuser/store','App\Http\Controllers\HistoryPosyanduuserController@store');
Route::get('historyPosyanduuser/edit/{id}','App\Http\Controllers\HistoryPosyanduuserController@edit');
Route::post('historyPosyanduuser/update','App\Http\Controllers\HistoryPosyanduuserController@update');
Route::get('historyPosyanduuser/hapus/{id}','App\Http\Controllers\HistoryPosyanduuserController@hapus');
Route::get('historyPosyanduuser/restore','App\Http\Controllers\HistoryPosyanduuserController@restore');
Route::get('historyPosyanduuser/restore/{id}','App\Http\Controllers\HistoryPosyanduuserController@back');

Route::get('parentsuser','App\Http\Controllers\parentsuserController@index');
Route::post('parentsuser/store','App\Http\Controllers\parentsuserController@store');
Route::get('parentsuser/edit/{id}','App\Http\Controllers\parentsuserController@edit');
Route::post('parentsuser/update','App\Http\Controllers\parentsuserController@update');
Route::get('parentsuser/hapus/{id}','App\Http\Controllers\parentsuserController@hapus');
Route::get('parentsuser/restore','App\Http\Controllers\parentsuserController@restore');
Route::get('parentsuser/restore/{id}','App\Http\Controllers\parentsuserController@back');

Route::get('/balitaparent', 'App\Http\Controllers\balitaparentController@index');
Route::get('/historyposyanduparent', 'App\Http\Controllers\historyposyanduparentController@index');

