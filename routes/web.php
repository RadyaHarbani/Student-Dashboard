<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/home', function () {
    return view('home', ["title" => "Home"]);
});

Route::get('/about', function () {
    return view(
        'about',
    [
        "title" => "About", 
        "nama" => "Radya Harbani", 
        "kelas" => "11 PPLG 2", 
        "foto" => "assets/test.png"
    ]);
});

Route :: group(['prefix' => 'students'], function () {
    Route::get('/all', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/create', [StudentsController::class, 'create'])->name('student.create');
    Route::post('/store', [StudentsController::class, 'store'])->name('student.store');
    Route::delete('/delete/{student}', [StudentsController::class, 'destroy'])->name('student.destroy');
    Route::get('/{student}/edit', [StudentsController::class, 'edit'])->name('student.edit');
    Route::patch('/students/{student}', [StudentsController::class, 'update'])->name('student.update');
});

Route :: group(['prefix' => 'kelas'], function () {
    Route::get('/all', [KelasController::class, 'index']);
    Route::get('/detail/{kelas}', [KelasController::class, 'show']);
    Route::get('/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::delete('/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    Route::get('/{kelas}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::patch('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
});
