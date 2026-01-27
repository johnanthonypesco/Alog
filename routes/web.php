<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Existing Admin Controllers
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\Admin\StockInController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InventoryController;

// NEW: Import the ProductController we just created
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\EmployeeController;
use App\Http\Controllers\AdminController\TwofactorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- PUBLIC ROUTES (No Login Required) ---
Route::get('/', [LoginController::class, 'showLogin'])->name('admin.login');
Route::get('/2fa', [TwofactorController::class, 'showTwofactor'])->name('admin.2fa');


// --- PROTECTED ROUTES (Login Required) ---
Route::middleware('auth')->group(function () {

    // 1. User Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 2. Admin Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'showDashboard'])->name('admin.dashboard');

    // 3. Employee Management
    Route::get('/employee', [EmployeeController::class, 'showEmployee'])->name('admin.employee');

    // 4. Inventory Management
    
    // A. Current Stock (Kept your original controller for stock viewing if needed)
    Route::get('/inventory/current-stock', [InventoryController::class, 'showCurrentStock'])->name('admin.inventory.currentstock');
    
    // For Release Page
    Route::get('/inventory/for-release', [InventoryController::class, 'forRelease'])->name('admin.inventory.forrelease');
    // B. Product Management (UPDATED: Uses the new ProductController)
    // This loads the page with the Category Dropdown and Product Table
    Route::get('/inventory/products', [ProductController::class, 'index'])->name('admin.inventory.products');

    // C. Form Submissions (New Logic for saving data)
    Route::post('/inventory/category/store', [ProductController::class, 'storeCategory'])->name('category.store');
    Route::post('/inventory/product/store', [ProductController::class, 'storeProduct'])->name('product.store');

    Route::get('/inventory/suppliers', [SupplierController::class, 'index'])->name('admin.suppliers.index');
Route::post('/suppliers/store', [SupplierController::class, 'store'])->name('suppliers.store');

Route::get('/inventory/stock-in', [StockInController::class, 'index'])->name('stock_in.index');
Route::post('/inventory/stock-in', [StockInController::class, 'store'])->name('stock_in.store');

Route::get('/inventory/products', [ProductController::class, 'index'])->name('admin.inventory.products');
Route::post('/inventory/products', [ProductController::class, 'storeProduct'])->name('product.store');

// Inventory Main Page (Index)
// Route::get('/inventory/products', [ProductController::class, 'index'])->name('admin.inventory.products');

// Create & Store
Route::post('/inventory/products', [ProductController::class, 'storeProduct'])->name('product.store');

// Edit & Update
Route::put('/inventory/products/{id}', [ProductController::class, 'updateProduct'])->name('product.update');

// Archive (Soft Delete)
Route::delete('/inventory/products/{id}', [ProductController::class, 'archiveProduct'])->name('product.archive');

// Restore (Bring back from Archive) - THIS IS CRITICAL
Route::post('/inventory/products/{id}/restore', [ProductController::class, 'restoreProduct'])->name('product.restore');

// Categories
Route::post('/inventory/category', [ProductController::class, 'storeCategory'])->name('category.store');

});

require __DIR__.'/auth.php';