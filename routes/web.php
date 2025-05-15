<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/telegram/webhook', [TelegramController::class, 'handle'])->name('telegram.webhook');
Route::get('/messages/send-message', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages/send-message', [MessageController::class, 'sendMessage'])->name('messages.send-message');