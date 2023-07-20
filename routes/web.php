<?php

use App\Http\Controllers\pagesController;
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
    return view('dashboard');
})->name('home');

Route::get('/componentAlert',[pagesController::class,'componentAlert']);

Route::get('/login',[pagesController::class, 'Login'])->name('login');

//use the name to define route name

Route::get('/register',[pagesController::class,'Register'])->name('register');

Route::get('/profile',[pagesController::class,'gotoProfile'])->name('profile');

Route::get('/error-404',[pagesController::class,'notFound'])->name('notFound');

Route::get('/faq',[pagesController::class,'gotoFAQ'])->name('faq');

Route::get('/contact',[pagesController::class,'gotoContact'])->name('contact');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
