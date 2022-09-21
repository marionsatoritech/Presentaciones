<?php

use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class,"index"])->name("entryPoint");
Route::get('/notify/{id}', [HomeController::class,"notify"])->name("notify");
Route::get('/visto/{id}', [HomeController::class,"visto"])->name("visto");

Route::get('/dashboard', function () {
    //dd(Auth::user()->notifications);
    return view('dashboard',['users' => User::all()]);
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
