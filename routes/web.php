<?php

use App\Http\Controllers\EducationController;
use App\Models\Hero;
use App\Models\About;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Herocontroller;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SumaryController;
use App\Models\Mission;

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
    $skills = Skill::where('active','1')->get();
    $about = About::orderByDesc('id')->first();
    return view('myportfolio.index',compact('heroes','about','skills'));
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

    Route::prefix('social')->group(function(){
        Route::get("/",[SocialController::class,'index'])->name('social');
        Route::get("/create",[SocialController::class,'create'])->name('social.create');
        Route::get("/edit/{social}",[SocialController::class,'edit'])->name('social.edit');


    });

    Route::prefix('about')->group(function(){
        Route::get("/",[AboutController::class,'index'])->name('about');
        Route::get("/create",[AboutController::class,'create'])->name('about.create');
        Route::get("/edit/{about}",[AboutController::class,'edit'])->name('about.edit');


    });

    Route::prefix('skill')->group(function(){
        Route::get("/",[SkillController::class,'index'])->name('skill');
        Route::get("/create",[SkillController::class,'create'])->name('skill.create');
        Route::get("/edit/{skills}",[SkillController::class,'edit'])->name('skill.edit');


    });

    Route::prefix('sumary')->group(function(){
        Route::get("/",[SumaryController::class,'index'])->name('sumary');
        Route::get("/create",[SumaryController::class,'create'])->name('sumary.create');
        Route::get("/edit/{sumary}",[SumaryController::class,'edit'])->name('sumary.edit');


    });

    Route::prefix('education')->group(function(){
        Route::get("/",[EducationController::class,'index'])->name('education');
        Route::get("/create",[EducationController::class,'create'])->name('education.create');
        Route::get("/edit/{education}",[EducationController::class,'edit'])->name('education.edit');


    });

    Route::prefix('experience')->group(function(){
        Route::get("/",[ExperienceController::class,'index'])->name('experience');
        Route::get("/create",[ExperienceController::class,'create'])->name('experience.create');
        Route::get("/edit/{experience}",[ExperienceController::class,'edit'])->name('experience.edit');


    });

    Route::prefix('mission')->group(function(){
        Route::get("/",[MissionController::class,'index'])->name('mission');
        Route::get("/create",[MissionController::class,'create'])->name('mission.create');
        Route::get("/edit/{mission}",[MissionController::class,'edit'])->name('mission.edit');

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
