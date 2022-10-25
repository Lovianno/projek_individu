<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\jenisKontakController;
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



// contoh awal (gaguna)
Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/projects', function () {
    return view('projects');
});


// admin
// Route::get('/', function () {
//     return view('layout.masterDashboard');
// });
// Route::get('/masterdashboard', function () {
//     return view('layout.masterDashboard');
// });
// Route::get('/masterproject', function () {
//     return view('layout.masterProject');
// });
// Route::get('/mastersiswa', function () {
//     return view('layout.masterSiswa');
// });
// Route::get('/mastercontact', function () {
//     return view('layout.masterContact');
// });


Route:: middleware('guest')->group(function(){

    Route::get('/', [loginController::class, 'index']);
    Route::get('login', [loginController::class, 'index'])->name('login');
    Route::post('login', [loginController::class, 'authenticate']);

});

Route:: middleware('auth')->group(function(){
// Route::resource('', dashboardController::class );

    Route::resource('masterdashboard', dashboardController::class);
    Route::resource('masterproject', projectController::class);
    Route::resource('mastersiswa', siswaController::class );
    Route::resource('masterjk', jenisKontakController::class );
    Route::get('mastersiswa/{id_siswa}/hapus', [siswaController::class, 'hapus'])->name('mastersiswa.hapus');
    Route::get('masterproject/{id_siswa}/hapus', [projectController::class, 'hapus'])->name('masterproject.hapus');
    Route::get('mastercontact/{id_siswa}/hapus', [contactController::class, 'hapus'])->name('mastercontact.hapus');
    Route::get('masterjk/{id_jk}/hapus', [jenisKontakController::class, 'hapus'])->name('masterjk.hapus');
    Route::get('masterproject/create/{id_siswa}', [projectController::class, 'tambah'])->name('masterproject.tambah');
    Route::get('mastercontact/create/{id_siswa}', [contactController::class, 'tambah'])->name('mastercontact.tambah');
    Route::resource('mastercontact', contactController::class );
Route::post('logout', [loginController::class, 'logout']);

});
// Login controller

