<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TicketAdminController;

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



Route::get('/', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');




Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/tickets', [TicketAdminController::class, 'index'])->name('admin.tickets.index');
    Route::get('/tickets/{ticket}', [TicketAdminController::class, 'show'])->name('admin.tickets.show');
    Route::post('/tickets/{ticket}/note', [TicketAdminController::class, 'note'])->name('admin.tickets.note');
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
