<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DoorprizeController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/', [TicketController::class, 'index'])->name('home');
Route::post('/register', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/success/{phone}', [TicketController::class, 'success'])->name('ticket.success');
Route::get('/download/{phone}', [TicketController::class, 'downloadPdf'])->name('ticket.download');
Route::get('/doorprize', [DoorprizeController::class, 'index'])->name('doorprize.index');
Route::get('/doorprize/spin', [DoorprizeController::class, 'getWinner'])->name('doorprize.spin');
Route::post('/doorprize/confirm', [DoorprizeController::class, 'confirmWinner'])->name('doorprize.confirm');