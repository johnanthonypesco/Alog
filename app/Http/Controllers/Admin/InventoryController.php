<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class InventoryController extends Controller
{
   public function showCurrentStock(Request $request)
{
    // Eager load batches, but filter for ACTIVE stocks only (remaining > 0)
    // and sort them by Expiry Date (FIFO logic)
    $query = Product::with(['category', 'units', 'batches' => function($q) {
        $q->where('remaining_quantity', '>', 0)
          ->orderBy('expiry_date', 'asc') // Expiry first
          ->orderBy('received_date', 'asc'); // Then oldest received
    }]);

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('brand', 'like', '%' . $request->search . '%');
    }

    if ($request->category) {
        $query->where('category_id', $request->category);
    }

    $products = $query->paginate(15); 
    $categories = Category::all();
    
    // Data for Modal
    $suppliers = Supplier::where('is_active', true)->get();
    $allProducts = Product::with('units')->where('alert_level', '>=', 0)->get();

    return view('admin.inventory.currentstock', compact('products', 'categories', 'suppliers', 'allProducts'));
}

    public function forRelease(){
        return view('admin.inventory.forrelease');
    }
}

