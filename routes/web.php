<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/browse-all-projects', [App\Http\Controllers\ProjectController::class, 'list']);
Route::get('/find-patterns-with-threads', [App\Http\Controllers\FindController::class, 'index']);
Route::post('/compare-patterns', [App\Http\Controllers\FindController::class, 'compare']);


// Route::get('/projects-import', [App\Http\Controllers\ProjectController::class, 'import']);
