<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier; // <--- This was missing or not being used

class InventoryController extends Controller
{
    /**
     * Display the Current Stocks page.
     */
    public function showCurrentStock()
    {
        // 1. Fetch all Suppliers (Required for the dropdown in your error)
        $suppliers = Supplier::where('is_active', true)->get();

        // 2. Fetch Products with their units (For the table display)
        $products = Product::with('units')->get();

        // 3. Pass both variables to the view
        return view('admin.inventory.currentstock', compact('suppliers', 'products'));
    }

    /**
     * Display the Products List (If you are still using this method here)
     */
    public function showProducts()
    {
        // If you moved this logic to ProductController, you can remove this or redirect
        return redirect()->route('admin.inventory.products');
    }
}