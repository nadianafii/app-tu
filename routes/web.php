<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\LetterTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.index');
// })->name('dashboard');


Route::get('/', function (){
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postLogin', [AuthController::class, 'login'])->name('postlogin');
Route::get('/logout', [AuthController::class, 'signOut'])->name('logout');
Route::get('/error-permission',function() {
    return view ('errors.permission');
})->name('error.permission');

Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');

Route::get('/logout', [AuthController::class, 'signOut'])->name('logout');

// ngarahin ke dashboard sete;ah login
Route::middleware('IsLogin')->group(function () {
    // home itu bebas
    Route::get('/home', function() {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/sesi', [LetterController::class, 'index']);
Route::get('/sesi/login', [LetterController::class, 'index']);

Route::prefix('staff')->name('staff.')->group(function() {
Route::get('/data', [StaffController::class, 'index'])->name('index');
Route::get('/create', [StaffController::class, 'create'])->name('create');
Route::post('store', [StaffController::class, 'store'])->name('store');
Route::get('/{id}', [StaffController::class, 'edit'])->name('edit');
Route::patch('/{id}', [StaffController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [StaffController::class, 'destroy'])->name('delete');

});

Route::prefix('guru')->name('guru.')->group(function() {
    Route::get('/data', [GuruController::class, 'index'])->name('index');
    Route::get('/create', [GuruController::class, 'create'])->name('create');
    Route::post('store', [GuruController::class, 'store'])->name('store');
    Route::get('/id/(id)', [GuruController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [GuruController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [GuruController::class, 'destroy'])->name('delete');
});


Route::prefix('letter')->name('letter.')->group(function() {
    Route::get('/data', [LetterController::class, 'index'])->name('index');
    Route::get('/create', [LetterController::class, 'create'])->name('create');
    Route::post('/store', [LetterController::class, 'store'])->name('store');
    Route::get('/id/{id}', [LetterController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [LetterController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [LetterController::class, 'destroy'])->name('delete');
});

Route::prefix('klasifikasi-surat')->name('klasifikasi-surat.')->group(function() {
    Route::get('/', [LetterTypeController::class, 'index'])->name('index');
    Route::get('/create', [LetterTypeController::class, 'create'])->name('create');
    Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LetterTypeController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [LetterTypeController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [LetterTypeController::class, 'destroy'])->name('delete');

});

