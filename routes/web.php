<?php

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

// ==========================================
// ROUTE ADMIN
// ==========================================
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/rooms', function () {
    return view('rooms');
});

Route::get('/facilities', function () {
    return view('facilities');
});

Route::get('/information', function () {
    return view('information');
});

Route::get('/laundry', function () {
    return view('laundry');
});

Route::get('/chatbot', function () {
    return view('chatbot');
});

Route::get('/questions', function () {
    return view('questions');
});

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

// Route Logout (Sederhana)
Route::post('/logout', function () {
    return redirect('/')->with('success', 'Berhasil logout.');
})->name('logout');


// ==========================================
// ROUTE USER (PENGHUNI)
// ==========================================
Route::view('/user/dashboard', 'user.dashboard')
    ->name('user.dashboard');

Route::view('/user/informasi-kost', 'user.inform')
    ->name('user.inform');

Route::view('/user/rooms', 'user.rooms')
    ->name('user.rooms');

Route::view('/user/rooms/standard', 'user.room-standard')
    ->name('user.rooms.standard');

Route::view('/user/rooms/nyaman', 'user.room-nyaman')
    ->name('user.rooms.nyaman');

Route::view('/user/rooms/privat', 'user.room-privat')
    ->name('user.rooms.privat');

Route::view('/user/chatbot', 'user.chatbot')
    ->name('user.chatbot');


// ==========================================
// ROUTE RESET PASSWORD
// ==========================================
Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->name('password.reset');