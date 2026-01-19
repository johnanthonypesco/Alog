<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\TwofactorController;
use App\Http\Controllers\AdminController\EmployeeController;
use App\Http\Controllers\Admin\InventoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [LoginController::class, 'showLogin'])->name('admin.login');
Route::get('/2fa', [TwofactorController::class, 'showTwofactor'])->name('admin.2fa');
Route::get('/employee', [EmployeeController::class, 'showEmployee'])->name('admin.employee');
Route::get('/inventory/current-stock', [InventoryController::class, 'showCurrentStock'])->name('admin.inventory.currentstock');
Route::get('/inventory/products', [InventoryController::class, 'showProducts'])->name('admin.inventory.products');



require __DIR__.'/auth.php';
