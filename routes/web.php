<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BabyController;
use App\Http\Controllers\BeautyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeCareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Foundation\Console\AboutCommand;
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

Route::get('/', [HomeController::class, 'home']);

// Route::get('/hello', function () {
//     return 'Hello, World!';
// });

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/world', function () {
    return 'World';
});

Route::get('/about', [AboutController::class, 'about']);

// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya ' . $name;
// });

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-' . $postId . " Komentar ke-: " . $commentId;
});

// Route::get('/articles/{id}', function ($id) {
//     return 'Halaman Artikel dengan ID ' . $id;
// });

Route::get('/articles/{id}', [ArticleController::class, 'articles']);

// Route::get('/user/{name?}', function ($name=null) {
//     return 'Nama saya '.$name;
// }); 

// Route::get('/user/{name?}', function ($name = 'John') {
//     return 'Nama saya ' . $name;
// });

// Route::resource('photos', PhotoController::class);

// Route::resource('photos', PhotoController::class)->only(['index', 'show']);

Route::resource('photos', PhotoController::class)->except([
    'create',
    'store',
    'update',
    'destroy'
]);

// Route::get('/greeting', function (){
//     return view ('blog.hello', ['name'=> 'Rafli']);
// });

Route::get('/greeting', [WelcomeController::class, 'greeting']);

Route::get('/category', [CategoryController::class, 'category']);

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [FoodController::class, 'food_beverage']);
    Route::get('/beauty-health', [BeautyController::class, 'beauty_health']);
    Route::get('/home-care', [HomeCareController::class, 'home_care']);
    Route::get('/baby-kid', [BabyController::class, 'baby_kid']);
});

Route::get('/user/{id?}/name/{name?}', [ProfilController::class, 'profil']);

Route::get('/transaksi', [TransaksiController::class, 'transaksi']);