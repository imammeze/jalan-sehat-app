<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', [TicketController::class, 'index'])->name('home');
Route::post('/register', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/success/{phone}', [TicketController::class, 'success'])->name('ticket.success');
Route::get('/download/{phone}', [TicketController::class, 'downloadPdf'])->name('ticket.download');