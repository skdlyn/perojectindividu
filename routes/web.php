<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JenisKontakController;

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


//guest
Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenthicate']);

    Route::get('/', function () {
        return view('home');
    });
    
    Route::get('/admin', function () {
        return view('master.admin');
    });
    
    Route::get('/about', function () {
        return view('aboutme');
    });
    
    Route::get('/contact', function () {
        return view('contact');
    });
    
    Route::get('/project', function () {
        return view('project');
    });
    
    Route::get('/mastersiswa', function () {
        return view('mastersiswa');
    });
    
    Route::get('/masterproject', function () {
        return view('masterproject');
    });
     
    Route::get('/mastercontact', function () {
        return view('mastercontact');
    });
    
});


//admin
Route::middleware(['auth', 'CekLevel:admin'])->group(function(){
    Route::resource('dashboard', DashboardController::class);
    route::get('mastersiswa/{id_siswa}/hapus', [SiswaController::class,'hapus'])->name('mastersiswa.hapus');
    Route::resource('mastersiswa', SiswaController::class);
    Route::resource('masterproject', ProjectController::class);
    Route::get('masterproject/create/{id_siswa}', [ProjectController::class, 'tambah'])->name('masterproject.tambah');
    route::get('masterproject/{id_siswa}/hapus', [ProjectController::class,'hapus'])->name('masterproject.hapus');
    Route::resource('mastercontact', KontakController::class);
    Route::get('mastercontact/create/{id_siswa}', [KontakController::class, 'tambah'])->name('mastercontact.tambah');
    route::get('mastercontact/{id_siswa}/hapus', [KontakController::class,'hapus'])->name('mastercontact.hapus');
    Route::resource('masterjeniskontak', JenisKontakController::class);
    route::get('masterjeniskontam/{id_jenis_kontak}/hapus', [JenisKontakController::class,'hapus'])->name('masterjeniskontak.hapus');
    Route::post('logout', [LoginController::class, 'logout']);
});
// Route::get('/forgot_password', function () {
//     return view('masuk.fp');
// });

// Route::get('/register', function () {
//     return view('masuk.register');
// });

// Route::get('/login', function () {
//     return view('masuk.login');
// });
