<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValoracionController;
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
    return view('auth/register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('types', TypeController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('terms', TermController::class);
});

/*Route::middleware('auth')->group(function () {
    Route::get('ideas/create', 'IdeaController@create')->name('ideas.create');
    Route::post('ideas', 'IdeaController@store')->name('ideas.store');
    Route::get('ideas/{idea}/edit', 'IdeaController@edit')->name('ideas.edit');
    Route::put('ideas/{idea}', 'IdeaController@update')->name('ideas.update');
    Route::delete('ideas/{idea}', 'IdeaController@destroy')->name('ideas.destroy');
});*/
Route::middleware('auth')->group(function () {
    Route::resource('ideas', IdeaController::class);
});

Route::middleware('auth')->group(function () {
    Route::post('/valorar', [ValoracionController::class, 'store'])->name('valorar');
});


Route::get('/language/{lang}', function ($lang) {
    session(['language' => $lang]);
    return redirect()->back();
})->name('language');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
