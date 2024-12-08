<?php
use App\Models\Room;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardRoomController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardCategoryController;

// Halaman Umum
Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'room' => Room::all(),
        'active' => 'home'
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
    ]);
})->name('about');

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact us',
        'active' => 'contact',
    ]);
})->name('contact');

Route::get('/reservation/{room:slug}', [ReservationController::class, 'index'])->middleware('auth');
Route::post('/reservation/{room:slug}', [ReservationController::class, 'processReservation'])->middleware('auth');
Route::get('/receipt/{orderId}', [ReservationController::class, 'showReceipt']);

// Profil
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::put('/profile/{user:username}/edit', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

// Rooms
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/room/{room:slug}', [RoomController::class, 'show']); // route model binding

// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/forgot-password', [PasswordController::class, 'index'])->name('password-request')->middleware('guest');
Route::post('/forgot-password', [PasswordController::class, 'passwordEmail'])->name('password-email')->middleware('guest');
Route::get('/reset-password/{token}', [PasswordController::class, 'resetPassword'])->name('password.reset')->middleware('guest');
Route::post('/reset-password', [PasswordController::class, 'passwordVerify'])->name('password.update')->middleware('guest');

// Dashboard (Admin)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/dashboard/rooms/checkSlug', [DashboardRoomController::class, 'checkSlug'])->middleware(['auth', 'admin']);
Route::get('/dashboard/rooms/booked', [DashboardRoomController::class, 'booked'])->middleware(['auth', 'admin']);
Route::resource('/dashboard/rooms', DashboardRoomController::class)->middleware(['auth', 'admin']);
Route::patch('/dashboard/rooms/{room:slug}/status', [DashboardRoomController::class, 'updateStatus']);
Route::resource('/dashboard/users', DashboardUserController::class)->except(['show', 'create'])->middleware(['auth', 'admin']);
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware(['auth', 'admin']);
Route::get('/dashboard/change-password', [PasswordController::class, 'changePassword'])->middleware(['auth', 'admin']);
Route::post('/dashboard/change-password', [PasswordController::class, 'processChangePassword'])->name('password.change')->middleware(['auth', 'admin']);

// Social Authentication
Route::get('/auth/google', [SocialAuthController::class, 'googleRedirect'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'googleCallback'])->name('google.callback');
// Route::get('/auth/facebook', [SocialAuthController::class, 'facebookRedirect'])->name('facebook.login');
// Route::get('/auth/facebook/callback', [SocialAuthController::class, 'facebookCallback']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Contact
Route::post('/send-to-whatsapp', [ContactController::class, 'sendToWhatsApp'])->name('send.to.whatsapp');
