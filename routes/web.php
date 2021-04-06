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

Route::get('/','User\UserController@home')->name('user.home');
Route::get('/berita', 'User\UserController@berita')->name('user.berita');
Route::get('/berita-details/{berita}', 'User\UserController@beritaDetails')->name('user.berita.details');
Route::get('/berita-kategori/{kategori}', 'User\UserController@beritaKategori')->name('user.berita.kategori');
Route::post('/komentar-berita', 'User\UserController@komentarBerita')->name('user.berita.komentar');
Route::get('/cari-berita','User\UserController@cariBerita')->name('user.berita.cari');
Route::get('/kontak','User\UserController@kontak')->name('user.kontak');
Route::post('/kontak','User\UserController@kontakUser')->name('user.kontak.create');


Route::prefix('/admin')->middleware('auth')->group( function (){
    Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
    Route::get('/berita', 'Admin\BeritaController@index')->name('admin.berita.index');
    Route::get('/create/berita', 'Admin\BeritaController@create')->name('admin.berita.create');
    Route::post('/create/berita', 'Admin\BeritaController@store')->name('admin.berita.store');
    Route::get('/edit/{berita}/berita', 'Admin\BeritaController@edit')->name('admin.berita.edit');
    Route::patch('/edit/{berita}', 'Admin\BeritaController@update')->name('admin.berita.update');
    Route::delete('/delete/{berita}', 'Admin\BeritaController@destroy')->name('admin.berita.destroy');
    Route::get('/kategori-berita', 'Admin\KategoriBeritaController@index')->name('admin.kategoriBerita.index');
    Route::get('/create/kategori-berita','Admin\KategoriBeritaController@create')->name('admin.kategoriBerita.create');
    Route::post('/create/kategori-berita', 'Admin\KategoriBeritaController@store')->name('admin.kategoriBerita.store');
    Route::get('/edit/{kategori}/edit', 'Admin\KategoriBeritaController@edit')->name('admin.kategoriBerita.edit');
    Route::patch('/update/{kategori}', 'Admin\KategoriBeritaController@update')->name('admin.kategoriBerita.update');
    Route::delete('/hapus/{kategori}', 'Admin\KategoriBeritaController@destroy')->name('admin.kategoriBerita.destroy');
    Route::get('/komentar-berita', 'Admin\KomentarController@komentar')->name('admin.komentarBerita');
    Route::get('/balas-komentar/{komentar}','Admin\KomentarController@balas')->name('admin.komentarBerita.balas');
    Route::patch('/balas-komentar/{komentar}','Admin\KomentarController@balasKomentar')->name('admin.komentarBerita.balasKomentar');
    Route::delete('/hapus-komentar/{komentar}', 'Admin\KomentarController@destroy')->name('admin.komentarBerita.destroy');
    Route::get('/kontak','Admin\KontakController@index')->name('admin.kontak');
    Route::delete('/kontak-hapus/{kontak}','Admin\KontakController@destroy')->name('admin.kontak.hapus');
});

Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/admin/login', 'Auth\LoginController@login')->name('store.login');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');
