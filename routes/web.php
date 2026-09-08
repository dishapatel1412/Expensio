<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\HTtp\Controllers\DashboardController;
use App\Http\Controllers\BudgetController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Dashboard route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Category routes
    Route::resource('categories', CategoryController::class);

    // Expense routes
    Route::resource('expenses', ExpenseController::class);

    // Budget page route
    Route::resource('budget', BudgetController::class)->except(['show']);

    // My profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
