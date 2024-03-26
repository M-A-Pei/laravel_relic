<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardCategoriesController;
use App\Http\Controllers\DashboardPostsController;
use App\Http\Controllers\postController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Models\Category;

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
    return view('home', [
        "title" => "home",
        "active" => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        "active" => "about"
    ]);
});

Route::get('/posts', [postController::class, 'index']);
Route::get('/single_post/{post:slug}', [postController::class, 'show']);

Route::get('/users', function(){
    return view('users', [
        "users" => User::latest()->paginate(10)->withQueryString(),
        "title" => "list of users",
        "active" => "users",
    ]);
});

Route::get('/categories', function(){
    return view('categories', [
        "categories" => Category::latest()->paginate(10)->withQueryString(),
        "title" => "Available Categories",
        "active" => "category",
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/sign_up', [SignupController::class, 'index']);
Route::post('/sign_up', [SignupController::class, 'store']);

route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostsController::class)->middleware('auth');
Route::resource('/dashboard/categories', DashboardCategoriesController::class)->middleware('auth')->middleware('isAdmin');