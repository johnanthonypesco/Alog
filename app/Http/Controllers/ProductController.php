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
        $categories = Category::all();
        $selectedCategoryId = $request->query('category_id');
        
        // Default to first category if none selected
        if (!$selectedCategoryId && $categories->isNotEmpty()) {
            $selectedCategoryId = $categories->first()->id;
        }

        // 1. Fetch ACTIVE products (for the main table)
        $products = Product::where('category_id', $selectedCategoryId)
                           ->with('units')
                           ->get();

        // 2. Fetch ARCHIVED products (for the Modal)
        $archivedProducts = Product::onlyTrashed()
                                   ->with('category')
                                   ->orderBy('deleted_at', 'desc')
                                   ->get();
                                   
        $currentCategory = $categories->find($selectedCategoryId);

        return view('admin.inventory.products', compact(
            'categories', 
            'products', 
            'archivedProducts', // <--- This sends data to your new Modal
            'currentCategory', 
            'selectedCategoryId'
        ));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|string',
            'base_unit' => 'required|string',
            'retail_price' => 'required|numeric|min:0',
            'unit_cost' => 'required|numeric|min:0',
            'units' => 'nullable|array',
            'units.*.name' => 'required_with:units|string',
            'units.*.factor' => 'required_with:units|numeric|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $product = Product::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'brand' => $request->brand,
                'base_unit' => $request->base_unit,
                'retail_price' => $request->retail_price,
                'unit_cost' => $request->unit_cost,
                'alert_level' => $request->alert_level ?? 10,
            ]);

            if ($request->has('units')) {
                $runningMultiplier = 1; 
                foreach ($request->units as $unitData) {
                    if (!empty($unitData['name']) && !empty($unitData['factor'])) {
                        $currentFactor = $unitData['factor'] * $runningMultiplier;
                        $product->units()->create([
                            'unit_name' => $unitData['name'],
                            'conversion_factor' => $currentFactor,
                            'wholesale_price' => $unitData['price'] ?? null,
                        ]);
                        $runningMultiplier = $currentFactor;
                    }
                }
            }
        });

        return back()->with('success', 'Product created successfully!');
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'base_unit' => 'required|string',
            'retail_price' => 'required|numeric|min:0',
            'unit_cost' => 'required|numeric|min:0',
            'units' => 'nullable|array',
        ]);

        DB::transaction(function () use ($request, $product) {
            $product->update([
                'name' => $request->name,
                'brand' => $request->brand,
                'base_unit' => $request->base_unit,
                'retail_price' => $request->retail_price,
                'unit_cost' => $request->unit_cost,
                'alert_level' => $request->alert_level,
            ]);

            // Re-create units
            $product->units()->delete();

            if ($request->has('units')) {
                $runningMultiplier = 1;
                foreach ($request->units as $unitData) {
                    if (!empty($unitData['name']) && !empty($unitData['factor'])) {
                        $currentFactor = $unitData['factor'] * $runningMultiplier;
                        $product->units()->create([
                            'unit_name' => $unitData['name'],
                            'conversion_factor' => $currentFactor,
                            'wholesale_price' => $unitData['price'] ?? null,
                        ]);
                        $runningMultiplier = $currentFactor;
                    }
                }
            }
        });

        return back()->with('success', 'Product updated successfully!');
    }

    public function archiveProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Soft Delete
        return back()->with('success', 'Product moved to archive.');
    }

    public function restoreProduct($id)
    {
        Product::withTrashed()->find($id)->restore(); // Restore
        return back()->with('success', 'Product restored successfully.');
    }

    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|unique:categories,name']);
        Category::create(['name' => $request->name]);
        return back()->with('success', 'Category Created');
    }
}