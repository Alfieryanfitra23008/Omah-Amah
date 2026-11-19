<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OmahAmahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

// API Informasi Kamar
Route::get('/rooms', [OmahAmahController::class, 'rooms']);
Route::get('/rooms/{slug}', [OmahAmahController::class, 'roomDetail']);
Route::post('/rooms', [OmahAmahController::class, 'storeRoom']);

// API CRUD Kamar Tambahan (Untuk Dashboard Admin)
Route::get('/rooms/id/{id}', [OmahAmahController::class, 'showRoom']);
Route::put('/rooms/{id}', [OmahAmahController::class, 'updateRoom']);
Route::delete('/rooms/{id}', [OmahAmahController::class, 'destroyRoom']);

// API Fasilitas
Route::get('/facilities', [OmahAmahController::class, 'facilities']);
Route::post('/facilities', [OmahAmahController::class, 'storeFacility']);
Route::put('/facilities/{id}', [OmahAmahController::class, 'updateFacility']);
Route::delete('/facilities/{id}', [OmahAmahController::class, 'destroyFacility']);

// API FAQ
Route::get('/faqs', [OmahAmahController::class, 'faqs']);

// API Informasi Kost
Route::get('/kost-profile', [OmahAmahController::class, 'profile']);
Route::put('/kost-profile', [OmahAmahController::class, 'updateProfile']);

// API Laundry
Route::get('/laundry', [OmahAmahController::class, 'getLaundry']);
Route::put('/laundry/{id}', [OmahAmahController::class, 'updateLaundry']);

// API Pesan dan Pertanyaan
Route::post('/inquiries', [OmahAmahController::class, 'storeInquiry']);
Route::get('/inquiries', [OmahAmahController::class, 'getInquiries']);
Route::put('/inquiries/{id}', [OmahAmahController::class, 'updateInquiryStatus']);

// API Pengaturan Admin
Route::get('/admin-profile', [OmahAmahController::class, 'getAdminProfile']);
Route::post('/admin-profile', [OmahAmahController::class, 'updateAdminProfile']);
Route::get('/notification-settings', [OmahAmahController::class, 'getNotificationSettings']);
Route::post('/notification-settings', [OmahAmahController::class, 'updateNotificationSettings']);

// API Chatbot AI 
Route::post('/chatbot', [OmahAmahController::class, 'askChatbot']);

// API Login, Register, Reset
Route::post('/login', [OmahAmahController::class, 'loginAdmin']);
Route::post('/register', [OmahAmahController::class, 'registerUser']);
Route::post('/forgot-password', [OmahAmahController::class, 'forgotPassword']); // <-- TAMBAHKAN INI
Route::post('/reset-password', [OmahAmahController::class, 'resetPassword']);

// API User (Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});