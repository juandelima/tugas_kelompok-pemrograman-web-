<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

//nilai siswa
Route::get('/input_nilai',['uses'=>'NilaiSiswaController@index','as'=>'value']);
Route::post('/save_nilai',['uses'=>'NilaiSiswaController@insert','as'=>'save_value']);
Route::get('/edit_nilai/{id}',['uses'=>'NilaiSiswaController@edit','as'=>'edit_value']);
Route::post('/update_nilai/{id}', ['uses'=>'NilaiSiswaController@update','as'=>'update_value']);
Route::post('/delete_nilai/{id}',['uses'=>'NilaiSiswaController@delete','as'=>'delete_value']);


//matkul
Route::get('/input_matkul',['uses'=>'MataKuliahController@index','as'=>'matkul']);
Route::post('/save_matkul', ['uses'=>'MataKuliahController@insert','as'=>'insert_mk']);
Route::post('/delete_matkul/{id}', ['uses'=>'MataKuliahController@delete','as'=>'delete_mk']);
Route::get('/edit/{id}', ['uses'=>'MataKuliahController@edit','as'=>'edit_mk']);
Route::post('/update/{id}', ['uses'=>'MataKuliahController@update','as'=>'update_mk']);
