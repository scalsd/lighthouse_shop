<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\Publishing_houseController;
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

// Frontend
Route::get('/',[IndexController::class,'home'])->name('home');
//Book category
Route::get('/categories/{slug}', [CategoryController::class, 'bookCategory'])->name('categories.list');
Route::get('/book-categories/{slug}', [IndexController::class, 'bookCategory'])->name('categories.show'); 

// Book detail
Route::get('/book-detail/{slug}/', [IndexController::class, 'bookDetail'])->name('book.detail');


// End Frontend


Auth::routes();
//Auth::routes(['register'=>false]);

Route::get('/admin-home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');


//Admin

Route::group(['prefix'=> 'admin','middleware'=>['auth', 'admin']], function () {
    Route::get('/', [AdminController ::class,'admin'])->name('admin');


//Banner Section
    Route::resource('/banner', BannerController::class);
    Route::post('banner_status', [BannerController::class,'bannerStatus'])->name('banner.status');

//Category Section
    Route::resource('/category', CategoryController::class);
    Route::post('category_status', [CategoryController::class,'categoryStatus'])->name('category.status');
    Route::get('/menu', [CategoryController::class, 'index']);

//Publishing house Section
    Route::resource('/publishing_house', Publishing_houseController::class);
    Route::post('publishing_house_status', [Publishing_houseController::class,'publishing_houseStatus'])->name('publishing_house.status');

//Author Section
    Route::resource('/author', AuthorController::class);
    Route::post('author_status', [AuthorController::class,'authorStatus'])->name('author.status');

//Series Section
    Route::resource('/series', SeriesController::class);
    Route::post('series_status', [SeriesController::class,'seriesStatus'])->name('series.status');

//Books Section
    Route::resource('/book', BookController::class);
    Route::post('book_status', [BookController::class,'bookStatus'])->name('book.status');

//Users Section
    Route::resource('/user', UserController::class);
    Route::post('user_status', [UserController::class,'userStatus'])->name('user.status');

//Posts Section
    Route::resource('/post', PostController::class);
    Route::post('post_status', [PostController::class,'postStatus'])->name('post.status');
//Register section
Route::get('/user/register', [RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [RegisterController::class, 'register'])->name('user.register.post');



});
