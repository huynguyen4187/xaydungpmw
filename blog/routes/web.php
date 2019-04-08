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


Route::get('/',[
	'as'=>'lg',
	'uses'=>'Controller@getLogin'
]);

//Route::post('dangnhap','Controller@postLogin');

Route::post('dangnhap',[
	'as'=>'dangnhap',
	'uses'=>'Controller@postLogin'
]);

Route::get('admin',function(){
	return view('quantri2');
});

Route::get('admin1',[
	'as'=>'admin1',
	'uses'=>'Controller@getLoaitin'
]);
Route::get('theloai','Controller@getTheloai');
// Route::get('quantri',function(){
// 	return view('admin.quantri');
// });


// Route::get('quantri','Controller@getLoaitin');
Route::get('xoa/{id}', 'Controller@getXoa');
Route::get('tintuc/{id}','Controller@getTintuc');