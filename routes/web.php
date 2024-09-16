<?php

use App\Http\Controllers\AdviceController;
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
    return view('welcome');
});

Route::get('/advices', [AdviceController::class, 'index'])->name('advices.index');
Route::get('/advices/{advice}', [AdviceController::class, 'edit'])->name('advices.edit');

Route::patch('/advices/{advice}', [AdviceController::class, 'update'])->name('advices.update');

Route::resource('/languages', App\Http\Controllers\LanguageController::class)->except(['show', 'destroy']);

Route::patch('/locale', App\Http\Controllers\LocaleController::class)->name('locale');

Route::get('/translate', App\Http\Controllers\TranslateController::class)->name('translate');
