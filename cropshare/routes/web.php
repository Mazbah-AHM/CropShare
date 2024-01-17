<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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
    $category = Category::get();
    $posts = Post::with('user')->get();
    $postIds = Post::where("user_id", Auth::id())->pluck('id')->toArray();
    $notifications = Notification::whereIn("post_id", $postIds)->get();
    $notificationCount = $notifications->count();

    return view('welcome', compact('category', 'posts', 'notifications', 'notificationCount'));
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/reset_password', [AuthController::class, 'resetPassword'])->name('reset_password');
    Route::post('/reset_password', [AuthController::class, 'resetPasswordPost'])->name('reset_password');
    // Route::post('/postcontact/{id}', [AuthController::class, 'postContact'])->name('getcontact');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/create.post', [PostController::class, 'createPost'])->name('createpost');
    Route::get('/getcontact/{id}', [AuthController::class, 'getContact'])->name('getcontact');
    Route::post('/like', [NotificationController::class, 'likePost'])->name('like.post');
});