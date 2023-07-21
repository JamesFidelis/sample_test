<?php

use App\Http\Controllers\pagesController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    return view('home');
})->name('home');

Route::get('/componentAlert',[pagesController::class,'componentAlert']);

Route::get('/login',[pagesController::class, 'Login'])->name('login');

//use the name to define route name

Route::get('/register',[pagesController::class,'Register'])->name('register');

Route::get('/profile',[pagesController::class,'gotoProfile'])->name('profile');

Route::get('/error-404',[pagesController::class,'notFound'])->name('notFound');

Route::get('/faq',[pagesController::class,'gotoFAQ'])->name('faq');

Route::get('/contact',[pagesController::class,'gotoContact'])->name('contact');


Route::get('/users',[pagesController::class,'gotoUsers'])->name('users');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
//        $users = User::all();

//        below is the query builder example
        $users = DB::table('users')->latest()->get();
        return view('dashboard',compact('users'));
    })->name('dashboard');
});


Route::get('/categories',[pagesController::class,'gotoCategories'])->name('categories');
Route::post('/categories',[pagesController::class,'addCategory'])->name('add_categories');
Route::post('/update-category/{id}',[pagesController::class,'updateCategory'])->name('update_category');
Route::get('/softdelete-category/{id}',[pagesController::class,'softDelete'])->name('update_category');
Route::get('/edit-category/{id}',[pagesController::class,'editCategory']);
