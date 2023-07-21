<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
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

Route::get('/',[pagesController::class,'Login'])->name('home');

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
        return view('home',compact('users'));
    })->name('dashboard');
});


//TODO: CATEGORIES ROUTES
Route::get('/categories',[CategoryController::class,'gotoCategories'])->name('categories');
Route::post('/categories',[CategoryController::class,'addCategory'])->name('add_categories');
Route::post('/update-category/{id}',[CategoryController::class,'updateCategory'])->name('update_category');
Route::get('/softdelete-category/{id}',[CategoryController::class,'softDelete'])->name('softDelete_category');
Route::get('/restore-category/{id}',[CategoryController::class,'restoreCategory'])->name('restore_category');
Route::get('/delete-category/{id}',[CategoryController::class,'permanentDelete'])->name('delete_category');
Route::get('/edit-category/{id}',[CategoryController::class,'editCategory']);



//TODO: BRAND CONTROLLER
Route::get('/brand',[BrandController::class,'gotoBrand'])->name('brand');
