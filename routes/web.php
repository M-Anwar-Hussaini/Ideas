<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('lang/{lang}', function ($lang) {
    Session::put('locale', $lang);
    App::setLocale(Session::get('locale'));
    return back();
})->name('lang');

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'can:admin']);
Route::get('/feed', FeedController::class)->name('feed')->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);
Route::resource('ideas.comments', CommentController::class)->middleware('auth');

Route::resource('users', UserController::class)->only('edit', 'update')->middleware('auth');
Route::resource('users', UserController::class)->only('show');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

// Like and unlike routes
Route::post('/ideas/{idea}/like', [LikeController::class, 'like'])->middleware('auth')->name('ideas.like');
Route::post('/ideas/{idea}/unlike', [LikeController::class, 'unlike'])->middleware('auth')->name('ideas.unlike');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
