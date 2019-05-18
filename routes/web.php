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

// Route::get('/generatePass', function() {
//     dd(bcrypt('administrator'));
// });

Route::get('/register', 'RegisterController@index')->name('register');
Route::get('/register-next', 'RegisterController@next')->name('register-next');
Route::Post('/register', 'RegisterController@register_proses')->name('register-proses');
ROute::get('/','HomeController@index')->name('index');
Route::get('/login-user', 'LoginController@index')->name('login-user');
Route::Post('/login-user', 'LoginController@proses')->name('login-proses');
Route::get('/logout-user','PeminjamController@logout_user')->name('logout-user');

Route::Post('/login-admin', 'LoginController@admin_proses')->name('login-proses-admin');
Route::get('/login-admin', 'LoginController@login_admin')->name('login-admin');
Route::get('/logout-admin','AdminController@logout_admin')->name('logout-admin');

Route::get('/login-operator', 'LoginController@login_operator')->name('login-operator');
Route::Post('/login-operator', 'LoginController@operator_proses')->name('login-proses-operator');
Route::get('/logout-operator','OperatorController@logout_operator')->name('logout-operator');

 
Route::get('/dashboard-admin/index', 'AdminController@index')->name('admin-dashboard');

Route::get('/dashboard-admin/data-admin', 'AdminController@admin_admin')->name('admin-admin');
Route::get('/dashboard-admin/tambah-data-admin', 'AdminController@tambah_admin_admin')->name('admin-tambah-admin');
Route::Post('/dashboard-admin/tambah-data-admin', 'AdminController@tambah_admin_proses')->name('create-admin-admin');
Route::get('/dashboard-admin/data-admin/{id_petugas}', 'AdminController@detail_admin_admin')->name('admin-admin-detail');
Route::get('/dashboard-admin/edit-data-admin/{id_petugas}', 'AdminController@edit_admin_admin')->name('admin-admin-edit');
Route::Post('/dashboard-admin/edit-data-admin/{id_petugas}', 'AdminController@edit_admin_proses')->name('update-admin-admin');
Route::get('/dashboard-admin/delete-data-admin/{id_petugas}','AdminController@delete_admin_admin')->name('delete-data-admin');


Route::get('/dashboard-admin/tambah-data-user', 'AdminController@tambah_user_admin')->name('admin-tambah-user');
Route::Post('/dashboard-admin/tambah-data-user', 'AdminController@tambah_user_proses')->name('create-user-admin');
Route::get('/dashboard-admin/data-user', 'AdminController@user_admin')->name('admin-user');
Route::get('/dashboard-admin/data-user/{id_peminjam}', 'AdminController@detail_user_admin')->name('admin-user-detail');
Route::get('/dashboard-admin/edit-data-user/{id_peminjam}', 'AdminController@edit_user_admin')->name('admin-user-edit');
Route::Post('/dashboard-admin/edit-data-user/{id_peminjam}', 'AdminController@edit_user_proses')->name('update-user-admin');
ROute::get('/dashboard-admin/delete-data-user/{id_peminjam}','AdminController@delete_user_admin')->name('delete-data-user');

Route::get('/dashboard-admin/data-operator', 'AdminController@operator_admin')->name('admin-operator');
Route::get('/dashboard-admin/tambah-data-operator', 'AdminController@tambah_operator_admin')->name('admin-tambah-operator');
Route::Post('/dashboard-admin/tambah-data-operator', 'AdminController@tambah_operator_proses')->name('create-operator-admin');
Route::get('/dashboard-admin/data-operator/{id_pegawai}', 'AdminController@detail_operator_admin')->name('admin-operator-detail');
Route::get('/dashboard-admin/edit-data-operator/{id_pegawai}', 'AdminController@edit_operator_admin')->name('admin-operator-edit');
Route::Post('/dashboard-admin/edit-data-operator/{id_pegawai}', 'AdminController@edit_operator_proses')->name('update-operator-admin');
Route::get('/dashboard-admin/delete-data-operator/{id_pegawai}','AdminController@delete_operator_admin')->name('delete-data-operator');


Route::get('/dashboard-admin/data-ruang', 'AdminController@ruang_admin')->name('admin-ruang');
Route::get('/dashboard-admin/data-ruang/{id_ruang}', 'AdminController@detail_ruang_admin')->name('admin-ruang-detail');
Route::get('/dashboard-admin/tambah-data-ruang', 'AdminController@tambah_ruang_admin')->name('admin-tambah-ruang');
Route::Post('/dashboard-admin/tambah-data-ruang', 'AdminController@tambah_ruang_proses')->name('create-ruang-admin');
Route::get('/dashboard-admin/edit-data-ruang/{id_ruang}', 'AdminController@edit_ruang_admin')->name('admin-ruang-edit');
Route::Post('/dashboard-admin/edit-data-ruang/{id_ruang}', 'AdminController@edit_ruang_proses')->name('update-ruang-admin');
Route::get('/dashboard-admin/delete-data-ruang/{id_ruang}', 'AdminController@delete_ruang_admin')->name('delete-data-ruang');

Route::get('/dashboard-admin/data-jenis', 'AdminController@jenis_admin')->name('admin-jenis');
Route::get('/dashboard-admin/data-jenis/{id_jenis}', 'AdminController@detail_jenis_admin')->name('admin-jenis-detail');
Route::get('/dashboard-admin/tambah-data-jenis', 'AdminController@tambah_jenis_admin')->name('admin-tambah-jenis');
Route::Post('/dashboard-admin/tambah-data-jenis', 'AdminController@tambah_jenis_proses')->name('create-jenis-admin');
Route::get('/dashboard-admin/edit-data-jenis/{id_jenis}', 'AdminController@edit_jenis_admin')->name('admin-jenis-edit');
Route::Post('/dashboard-admin/edit-data-jenis/{id_jenis}', 'AdminController@edit_jenis_proses')->name('update-jenis-admin');
Route::get('/dashboard-admin/delete-data-jenis/{id_jenis}', 'AdminController@delete_jenis_admin')->name('delete-data-jenis');

Route::get('/dashboard-admin/data-inventaris', 'AdminController@inventaris_admin')->name('admin-inventaris');
Route::get('/dashboard-admin/data-inventaris/{id_inventaris}', 'AdminController@detail_inventaris_admin')->name('admin-inventaris-detail');
Route::get('/dashboard-admin/tambah-data-inventaris', 'AdminController@tambah_inventaris_admin')->name('admin-tambah-inventaris');
Route::Post('/dashboard-admin/tambah-data-inventaris', 'AdminController@tambah_inventaris_proses')->name('create-inventaris-admin');
Route::get('/dashboard-admin/edit-data-inventaris/{id_inventaris}', 'AdminController@edit_inventaris_admin')->name('admin-inventaris-edit');
Route::Post('/dashboard-admin/edit-data-inventaris/{id_inventaris}', 'AdminController@edit_inventaris_proses')->name('update-inventaris-admin');
Route::get('/dashboard-admin/delete-data-inventaris/{id_inventaris}', 'AdminController@delete_inventaris_admin')->name('delete-data-inventaris');
Route::get('/dashboard-admin/pinjam-barang/{id_inventaris}', 'AdminController@tambah_pinjam_admin')->name('admin-tambah-pinjam');
Route::Post('/dashboard-admin/pinjam-barang', 'AdminController@create_pinjam_admin')->name('create-pinjam-admin');

Route::get('/dashboard-admin/data-peminjaman', 'AdminController@peminjaman_admin')->name('admin-peminjaman');
Route::get('/dashboard-admin/data-peminjaman/{id_peminjaman}', 'AdminController@detail_peminjaman_admin')->name('admin-peminjaman-detail');
Route::get('/dashboard-admin/edit-data-peminjaman/{id_detail_pinjam}', 'AdminController@edit_peminjaman_admin')->name('admin-peminjaman-edit');
Route::Post('/dashboard-admin/edit-data-peminjaman/{id_detail_pinjam}', 'AdminController@edit_peminjaman_proses')->name('update-admin-peminjaman');
Route::get('/dashboard-admin/delete-data-peminjaman/{id_peminjaman}', 'AdminController@delete_peminjaman_admin')->name('admin-peminjaman-delete');


Route::get('/dashboard-peminjam/data-user','PeminjamController@index')->name('user-dashboard');

Route::get('/dashboard-peminjam/data-inventaris','PeminjamController@user_inventaris')->name('user-inventaris');
Route::get('/dashboard-peminjam/data-inventaris/{id_inventaris}', 'PeminjamController@detail_inventaris_user')->name('user-inventaris-detail');
Route::get('/dashboard-peminjam/pinjam-barang/{id_inventaris}', 'PeminjamController@tambah_pinjam_peminjam')->name('user-tambah-pinjam');
Route::Post('/dashboard-peminjam/pinjam-barang', 'PeminjamController@create_pinjam_user')->name('create-pinjam-user');

Route::get('/dashboard-operator/data-operator','OperatorController@index')->name('operator-dashboard');
Route::get('/dashboard-operator/data-inventaris','OperatorController@operator_inventaris')->name('operator-inventaris');
Route::get('/dashboard-operator/data-inventaris/{id_inventaris}', 'OperatorController@detail_inventaris_operator')->name('operator-inventaris-detail');
Route::get('/dashboard-operator/pinjam-barang/{id_inventaris}', 'OperatorController@tambah_pinjam_operator')->name('operator-tambah-pinjam');
Route::Post('/dashboard-operator/pinjam-barang', 'OperatorController@create_pinjam_operator')->name('create-pinjam-operator');

Route::get('/dashboard-operator/data-peminjaman', 'OperatorController@peminjaman_operator')->name('operator-peminjaman');
Route::get('/dashboard-operator/data-peminjaman/{id_peminjaman}', 'OperatorController@detail_peminjaman_operator')->name('operator-peminjaman-detail');
Route::get('/dashboard-operator/edit-data-peminjaman/{id_detail_pinjam}', 'OperatorController@edit_peminjaman_operator')->name('operator-peminjaman-edit');
Route::Post('/dashboard-operator/edit-data-peminjaman/{id_detail_pinjam}', 'OperatorController@edit_peminjaman_proses')->name('update-operator-peminjaman');

Route::get('/dashboard-peminjam/riwayat/{id_peminjam}', 'PeminjamController@riwayat')->name('user-riwayat');

