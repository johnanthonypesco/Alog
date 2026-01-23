<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // (Same Index Logic as before...)
        $categories = Category::all();
        $selectedCategoryId = $request->query('category_id');
        
        if (!$selectedCategoryId && $categories->isNotEmpty()) {
            $selectedCategoryId = $categories->first()->id;
        }

        $products = Product::where('category_id', $selectedCategoryId)
                           ->with('units') // Eager load the units
                           ->get();
                           
        $currentCategory = $categories->find($selectedCategoryId);

        return view('admin.inventory.products', compact('categories', 'products', 'currentCategory', 'selectedCategoryId'));
    }

    public function storeProduct(Request $request)
    {
        // 1. Validate
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string',
            'base_unit' => 'required|string', // "Sachet"
            'retail_price' => 'required|numeric|min:0',
            'unit_cost' => 'required|numeric|min:0',
            
            // Validate the array of extra units
            'units' => 'nullable|array',
            'units.*.name' => 'required_with:units|string',
            'units.*.factor' => 'required_with:units|numeric|min:1',
        ]);

        // Use Transaction to ensure both Product and Units save correctly
        DB::transaction(function () use ($request) {
            
            // 2. Save the Base Product (Tingi)
            $product = Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'brand' => $request->brand,
                'base_unit' => $request->base_unit,
                'retail_price' => $request->retail_price,
                'unit_cost' => $request->unit_cost,
                'alert_level' => $request->alert_level ?? 10,
            ]);

            // 3. Process the Container Hierarchy
            if ($request->has('units')) {
                
                // We need to track the "Previous Unit Factor" to calculate the Multiplier
                // Example Input: 
                // Row 1: Box (Contains 25 Sachets)
                // Row 2: Carton (Contains 10 Boxes)
                
                $runningMultiplier = 1; 

                foreach ($request->units as $unitData) {
                    if (!empty($unitData['name']) && !empty($unitData['factor'])) {
                        
                        // LOGIC: The user inputs "How many of the PREVIOUS unit are in here?"
                        // So for Carton, they type "10" (Boxes).
                        // We multiply 10 * 25 (Box Factor) = 250 (Total Sachets).
                        
                        $currentFactor = $unitData['factor'] * $runningMultiplier;
                        
                        // Save to DB
                        $product->units()->create([
                            'unit_name' => $unitData['name'],
                            'conversion_factor' => $currentFactor, // Saves 250
                            'wholesale_price' => $unitData['price'] ?? null,
                        ]);

                        // Update the multiplier for the NEXT container
                        $runningMultiplier = $currentFactor;
                    }
                }
            }
        });

        return redirect()->back()->with('success', 'Product created successfully!');
    }

    // (Keep your storeCategory method here too...)
    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|unique:categories,name']);
        Category::create(['name' => $request->name]);
        return back()->with('success', 'Category Created');
    }
}