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
	return view('user.pages.home');
})->name('user.pages.home');

//login
Route::get('admin/login', 'LoginController@getLogin');
Route::post('admin/login', 'LoginController@postLogin');
//Route::get('admin/logout', 'LoginController@postLogin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	
	Route::get('logout', 'LoginController@getLogout');

	// loai san pham
	Route::group(['prefix'=>'cate'],function(){
		Route::get('list',['as'=>'admin.cate.list','uses'=>'LoaiSanPhamController@getList']);

		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'LoaiSanPhamController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'LoaiSanPhamController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'LoaiSanPhamController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'LoaiSanPhamController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'LoaiSanPhamController@getDelete']);
	});
	//nha san xuat
	Route::group(['prefix'=>'producer'],function()
	{
		Route::get('list',['as'=>'admin.producer.list','uses'=>'NhaSanXuatController@getList']);

		Route::get('add',['as'=>'admin.producer.getAdd','uses'=>'NhaSanXuatController@getAdd']);
		Route::post('add',['as'=>'admin.producer.postAdd','uses'=>'NhaSanXuatController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.producer.getEdit','uses'=>'NhaSanXuatController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.producer.postEdit','uses'=>'NhaSanXuatController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.producer.getDelete','uses'=>'NhaSanXuatController@getDelete']);
	});
	// san pham
	Route::group(['prefix'=>'product'],function()
	{
		Route::get('list',['as'=>'admin.product.list','uses'=>'SanPhamController@getList']);

		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'SanPhamController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'SanPhamController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'SanPhamController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'SanPhamController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'SanPhamController@getDelete']);
	});
	//User
	Route::group(['prefix'=>'user'],function()
	{
		Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getList']);
		//user
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		//Route::get('edit/{id}','UserController@getEdit')->name('admin.user.getEdit');
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
		// Route::post('day la url route',['as'=>'day la ten route','uses'=>'UserController@postAddVaiTro']);
	});
});

Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']);
Route::get('nha-san-xuat/{id}/{tennhasanxuat}',['as'=>'nhasanxuat','uses'=>'WelcomeController@nhasanxuat']);
Route::get('chi_tiet_san_pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']);
Route::get('lien-he',['as'=>'getlienhe','uses'=>'WelcomeController@get_lienhe']);
Route::post('lien-he',['as'=>'postlienhe','uses'=>'WelcomeController@post_lienhe']);
Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang','uses'=>'WelcomeController@checout']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);
Route::get('cap-nhat-gio-hang/{id}/{qty}',['as'=>'capnhatgiohang','uses'=>'WelcomeController@updateCart']);
//thanh toan
Route::get('thanh-toan','WelcomeController@getThanhToan')->name('user.pages.getThanhToan');
Route::post('thanh-toan','Welcomecontroller@postThanhToan')->name('user.pages.postThanhToan');

//user ng dung
Route::get('user/login','WelcomeController@getLogin')->name('user.login.getLogin');
Route::post('user/login','WelcomeController@postLogin')->name('user.login.postLogin');

Route::get('user/register','WelcomeController@getRegister')->name('user.register.getRegister');
Route::post('user/register','WelcomeController@postRegister')->name('user.register.postRegister');

Route::get('user/logout', 'WelcomeController@getLogout')->name('user.getLogout');
Route::get('test', function() {
   echo phpinfo();
});

Route::post('timkiem','WelcomeController@timkiem');
Route::get('lienhe','WelcomeController@lienhe');
Route::get('gioithieu','WelcomeController@gioithieu');