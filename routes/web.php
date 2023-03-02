<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\C_master_barang;
// use App\Http\Controllers\C_barang;
// use App\Http\Controllers\C_berita_acara;
use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_pegawai;
use App\Http\Controllers\C_master_barang;
use App\Http\Controllers\C_bon_barang;
use App\Http\Controllers\C_barang_masuk;
use App\Http\Controllers\C_rincian_bon_barang;
use App\Http\Controllers\C_rincian_barang_masuk;




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

Route::group(['middleware'=>['cekLogin']], function(){

    Route::get('/login', function () {
        return view('login');
    });
    Route::post('/login', [C_Login::class, 'cekUser'])->name("login");
    
    Route::get('/register', function () {
        return view('register');
    });

});

Route::get('/logout', [C_Login::class, 'logout']);

Route::group(['middleware'=>['cekDashboard']], function(){

    // Route::get('/', function () {
    //     return view('dashboard');
    // });
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });
    // Route::get('/master_barang', function () {
    //     return view('master_barang');
    // });
    // Route::get('/master_barang', [C_master_barang::class, 'index']);
    // Route::post('/add_master_barang', [C_master_barang::class, 'tambah'])->name("tambah_master");
    // Route::post('/edit_master_barang', [C_master_barang::class, 'edit'])->name("edit_master");
    // Route::get('/delete-master_barang/{id}', [C_master_barang::class, 'delete']);

    // Route::get('/bon_barang', [C_bon_barang::class, 'index']);
    // Route::post('/add_bon_barang', [C_bon_barang::class, 'tambah'])->name("tambah_bon");
    // Route::post('/edit_bon_barang', [C_bon_barang::class, 'edit'])->name("edit_bon");
    // Route::get('/delete-bon_barang/{id}', [C_bon_barang::class, 'delete']);

    // Route::get('/barang', [C_barang::class, 'index']);
    // Route::post('/add_barang', [C_barang::class, 'tambah'])->name("tambah_barang");
    // Route::post('/edit_barang', [C_barang::class, 'edit'])->name("edit_barang");
    // Route::get('/delete-barang/{id}', [C_barang::class, 'delete']);
    
    // Route::get('/detail_master_barang', function () {
    //     return view('detail_master_barang');
    // });
    // Route::get('/detail_berita_acara', function () {
    //     return view('detail_berita_acara');
    // });
    // Route::get('/detail_bon_barang', function () {
    //     return view('detail_bon_barang');
    // });

    // // barang masuk
    // Route::get('/detail_barang_masuk', function () {
    //     return view('detail_barang_masuk');
    // });
    // Route::get('/barang_masuk', [C_barang_masuk::class, 'index']);
    // Route::post('/add_barang_masuk', [C_barang_masuk::class, 'tambah'])->name("tambah");
    // Route::post('/edit_barang_masuk', [C_barang_masuk::class, 'edit'])->name("edit");
    // Route::get('/delete-barang_masuk/{id}', [C_barang_masuk::class, 'delete']);

    // Route::post('/barang_masuk-add_barang', [C_barang_masuk::class, 'tambah_barang'])->name("tambah_barang_a");
    // Route::post('/barang_masuk-edit_barang', [C_barang_masuk::class, 'edit_barang'])->name("edit_barang_a");
    // Route::get('/barang_masuk-delete-barang/{id}', [C_barang_masuk::class, 'delete_barang']);
    // // barang masuk

    // Route::get('/berita_acara', [C_berita_acara::class, 'index']);
    // Route::post('/add_berita_acara', [C_berita_acara::class, 'tambah'])->name("tambah_berita");
    // Route::post('/edit_berita_acara', [C_berita_acara::class, 'edit'])->name("edit_berita");
    // Route::get('/delete-berita_acara/{id}', [C_berita_acara::class, 'delete']);
    // Route::get('/cetak-berita_acara/{id}', [C_berita_acara::class, 'cetak']);

    // Route::get('laporan', function () {
    //     return view('laporan');
    // });


    // new
    Route::get('/', function () {
        return view('menu/v_dashboard');
    });
    
    // pegawai
    Route::get('/pegawai', [C_pegawai::class, 'index']);
    Route::post('/add_pegawai', [C_pegawai::class, 'tambah'])->name("tambah_pegawai");
    Route::post('/edit_pegawai', [C_pegawai::class, 'edit'])->name("edit_pegawai");
    Route::get('/delete-pegawai/{id}', [C_pegawai::class, 'delete']);

    // master barang
    Route::get('/master_barang', [C_master_barang::class, 'index']);
    Route::post('/add_master_barang', [C_master_barang::class, 'tambah'])->name("tambah_master_barang");
    Route::post('/edit_master_barang', [C_master_barang::class, 'edit'])->name("edit_master_barang");
    Route::get('/delete-master_barang/{id}', [C_master_barang::class, 'delete']);

    // bon barang
    Route::get('/bon_barang', [C_bon_barang::class, 'index']);
    Route::post('/add_bon_barang', [C_bon_barang::class, 'tambah'])->name("tambah_bon_barang");
    Route::get('/delete-bon_barang/{id}', [C_bon_barang::class, 'delete']);

    // rincian bon barang
    Route::get('/rincian_bon_barang/{id}', [C_rincian_bon_barang::class, 'index']);
    Route::post('/add_rincian_bon_barang', [C_rincian_bon_barang::class, 'tambah'])->name("tambah_rincian_bon_barang");
    Route::post('/edit_rincian_bon_barang', [C_rincian_bon_barang::class, 'edit'])->name("edit_rincian_bon_barang");
    Route::get('/delete-rincian_bon_barang/{id}', [C_rincian_bon_barang::class, 'delete']);
    Route::get('/accept-transaksi_bon_barang/{id}', [C_rincian_bon_barang::class, 'accept']);
    Route::get('/deny-transaksi_bon_barang/{id}', [C_rincian_bon_barang::class, 'deny']);

    Route::post('/cek_barang', [C_rincian_bon_barang::class, 'cek_barang']);

    // barang masuk
    Route::get('/barang_masuk', [C_barang_masuk::class, 'index']);
    Route::post('/add_barang_masuk', [C_barang_masuk::class, 'tambah'])->name("tambah_barang_masuk");
    Route::get('/delete-barang_masuk/{id}', [C_barang_masuk::class, 'delete']);

    // rincian barang masuk
    Route::get('/rincian_barang_masuk/{id}', [C_rincian_barang_masuk::class, 'index']);
    Route::post('/add_rincian_barang_masuk', [C_rincian_barang_masuk::class, 'tambah'])->name("tambah_rincian_barang_masuk");
    Route::post('/edit_rincian_barang_masuk', [C_rincian_barang_masuk::class, 'edit'])->name("edit_rincian_barang_masuk");
    Route::get('/delete-rincian_barang_masuk/{id}', [C_rincian_barang_masuk::class, 'delete']);
    Route::get('/accept-transaksi_barang_masuk/{id}', [C_rincian_barang_masuk::class, 'accept']);
    Route::get('/deny-transaksi_barang_masuk/{id}', [C_rincian_barang_masuk::class, 'deny']);
    Route::get('/cetak-transaksi_barang_masuk/{id}', [C_rincian_barang_masuk::class, 'cetak']);
    
    // Route::get('/tes', function () {
    //     return view('v_cetak_barang_masuk');
    // });

});


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
//     Route::get('/','Admin\AdminController@index');
// });
// Route::get('/barang_masuk','barang_masukController@index');