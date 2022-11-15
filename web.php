<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\PendaftaranKPController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;

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

// Membuat Route
Route::get('/welcome', function () {
    return "Welcome";
});

// Route dengan Parameter
Route::get('/show/{id}', function ($id) {
    return "Nilai Parameter adalah ". $id;
});

//Route dengan Parameter
Route::get('/show/{id?}', function ($id=7) {
    return "Nilai Parameter adalah ". $id;
});

// Route dengan Regular expression
Route::get('/edit/{Fauzi}', function ($nama) {
    return "Nilai Parameter adalah ". $nama;
})->where('Fauzi','[A-Za-z]+');

// Route dengan nama
Route::get('/index', function () { 
    echo "<a href='".route('create')."
    '>Akses Route dengan nama </a>";  
});

//Route dengan nama
Route::get('/create', function () { 
    echo "Route diakses menggunakan nama"; })->name('create');
  
// Route tampil
Route::get('/tampil/{Fauzi}', function ($name) {
    return "Hai my name is ". $name;
});

// Route dengan aksi controller
Route::get('/Mhs', [MahasiswaController::class, 'index']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/show', [ProdukController::class, 'show']);
Route::get('/produk/show', [ProdukController::class, 'show']);

Route::get('/layout',function(){
    $title = 'Layout Blade';
    $konten = 'Inilah isi dari Layout';
    return view('konten.halaman',compact('title','konten'));
   });

Route::resource('pendaftarankp', PendaftaranKPController::class);
Route::resource('todos', CRUDController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);
