<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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
    return view('home', ["title" => "Home"]);
});

Route::get('/', function () {
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

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'login']) ->middleware(['guest']);
    Route::post('/loginAdd', [AuthController::class, 'auth']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/register', [AuthController::class, 'register']) ->middleware(['guest']);
    Route::post('/registerAdd', [AuthController::class, 'store']);
});

Route::group(["prefix" => "/dashboard"], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);
    Route::get('/student', [DashboardController::class, 'student'])->middleware(['auth']);
    Route::get('/kelas', [DashboardController::class, 'kelas'])->middleware(['auth']);
    // Route::get('/search', [Dashboard::class, 'search'])->name('search');

});

// Route::group(["prefix" => "/login"], function(){
//     Route::get('/loginUser', [AuthController::class,'login'])->name('login.loginUser'); //view
//     Route::post('/add', [AuthController::class,'loginStore']); // add data
// });

// Route::group(["prefix" => "/register"], function(){
//     Route::get('/registerUser', [AuthController::class,'register'])->name('register.registerUser'); //view
//     Route::post('/add', [AuthController::class,'registerStore']); // add data
// });

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::group(["prefix" => "/dashboard"], function(){
//     Route::group(["prefix" => "/all"], function(){
//         Route::get('/all', [DashboardController::class,'all'])->name('dashboard.home.all'); //view
//     });
//     Route::group(["prefix" => "/student"], function(){
//         Route::get('/all', [DashboardController::class,'student'])->name('dashboard.student.all'); //view
//         Route::get('/detail/{student}', [DashboardController::class,'studentShow']); //detail
//         Route::get('/create', [DashboardController::class,'studentCreate']); //create data
//         Route::post('/add', [DashboardController::class,'studentStore']); // add data
//         Route::delete('/delete/{student}', [DashboardController::class,'studentDestory']); // delete data
//         Route::get('/edit/{student}', [DashboardController::class,'studentEdit']); // provide form edit
//         Route::post('/update/{student}', [DashboardController::class,'studentUpdate']); // edit data
//     });
//     Route::group(["prefix" => "/kelas"], function(){
//         Route::get('/all', [DashboardController::class,'kelas'])->name('dashboard.kelas.all'); //view
//         Route::get('/detail/{kelas}', [DashboardController::class,'kelasShow']); //detail
//         Route::get('/create', [DashboardController::class,'kelasCreate']); //create data
//         Route::post('/add', [DashboardController::class,'kelasStore']); // add data
//         Route::delete('/delete/{kelas}', [DashboardController::class,'kelasDestory']); // delete data
//         Route::get('/edit/{kelas}', [DashboardController::class,'kelasEdit']); // provide form edit
//         Route::post('/update/{kelas}', [DashboardController::class,'kelasUpdate']); // edit data
//     });
// });



