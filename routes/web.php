<?php

use App\Http\Controllers\Herocontroller;
use App\Models\Hero;
use Illuminate\Support\Facades\Route;

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
    $heroes = Hero::where('active','1')->first();
    return view('myportfolio.index');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('portfolio')->group(function(){
        Route::get("/",[Herocontroller::class,'index'])->name('portfolio');
        Route::get("/create",[Herocontroller::class,'create'])->name('portfolio.create');
        Route::get("/edit/{heroes}",[Herocontroller::class,'edit'])->name('portfolio.edit');
    });








});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
