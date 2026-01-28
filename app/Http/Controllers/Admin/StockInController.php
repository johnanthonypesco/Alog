<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryBatch;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockInController extends Controller
{
    public function index()
    {
        // 1. Fetch Data for Dropdowns (Modal)
        $suppliers = Supplier::where('is_active', true)->get();
        $allProducts = Product::with('units')->where('alert_level', '>=', 0)->get();
        
        // 2. Fetch Data for the Table (Paginated)
        $products = Product::with(['category', 'units', 'batches'])->paginate(15);
        $categories = Category::all();

        // 3. Return the View
        return view('admin.inventory.currentstock', compact('suppliers', 'allProducts', 'products', 'categories'));
    }

   public function store(Request $request)
{
    $request->validate([
        'supplier_id' => 'required|exists:suppliers,id',
        'product_id' => 'required|exists:products,id',
        
        // We now accept TWO unit types
        'unit_type_purchased' => 'required', 
        'unit_type_free' => 'nullable', 
        
        'quantity' => 'required|numeric|min:1',
        'free_quantity' => 'nullable|numeric|min:0',
        'total_cost' => 'required|numeric|min:0',
        'received_date' => 'required|date',
    ]);

    DB::transaction(function () use ($request) {
        $product = Product::with('units')->find($request->product_id);
        
        // 1. RESOLVE MULTIPLIER FOR PURCHASED ITEMS
        $paidMultiplier = 1; // Default to Base
        if ($request->unit_type_purchased !== 'base') {
            $unit = $product->units->where('unit_name', $request->unit_type_purchased)->first();
            if ($unit) $paidMultiplier = $unit->conversion_factor;
        }

        // 2. RESOLVE MULTIPLIER FOR FREE ITEMS
        $freeMultiplier = 1; // Default to Base
        // If user didn't select a specific free unit, assume it's the same as purchased, 
        // OR default to base. Let's default to whatever they sent in the request.
        if ($request->filled('unit_type_free') && $request->unit_type_free !== 'base') {
            $unit = $product->units->where('unit_name', $request->unit_type_free)->first();
            if ($unit) $freeMultiplier = $unit->conversion_factor;
        }

        // 3. CALCULATE TOTAL BASE UNITS
        // Example: 10 Boxes (x10) + 5 Sachets (x1) = 100 + 5 = 105 Total Base Units
        $baseQtyPurchased = $request->quantity * $paidMultiplier; 
        $baseQtyFree = ($request->free_quantity ?? 0) * $freeMultiplier; 
        $totalBaseQty = $baseQtyPurchased + $baseQtyFree;

        // 4. CALCULATE COSTS (Same logic as before, just using the new base totals)
        
        // A. List Cost Snapshot (Cost per BASE UNIT based on paid amount)
        $unitCostSnapshot = 0;
        if ($baseQtyPurchased > 0) {
            $unitCostSnapshot = $request->total_cost / $baseQtyPurchased;
        }

        // B. Effective Cost (Cost per BASE UNIT including freebies)
        $effectiveCost = 0;
        if ($totalBaseQty > 0) {
            $effectiveCost = $request->total_cost / $totalBaseQty;
        }

        // ... Date Logic ...
        $dueDate = null;
        if ($request->has('is_consignment')) {
            $supplier = Supplier::find($request->supplier_id);
            if ($supplier && $supplier->default_term_days > 0) {
                $dueDate = Carbon::parse($request->received_date)->addDays($supplier->default_term_days);
            }
        }

        // 5. SAVE BATCH
        InventoryBatch::create([
            'product_id' => $product->id,
            'supplier_id' => $request->supplier_id,
            'quantity_purchased' => $baseQtyPurchased,
            'quantity_free' => $baseQtyFree,
            'total_quantity' => $totalBaseQty,
            'remaining_quantity' => $totalBaseQty,
            'supplier_price' => $request->total_cost,
            'total_cost' => $request->total_cost,
            'unit_cost_snapshot' => $unitCostSnapshot,
            'effective_cost_per_unit' => $effectiveCost,
            'srp_snapshot' => $product->retail_price,
            'received_date' => $request->received_date,
            'expiry_date' => $request->expiry_date,
            'batch_code' => $request->batch_code,
            'is_consignment' => $request->has('is_consignment'),
            'due_date' => $dueDate,
        ]);

        // Don't overwrite master cost automatically, as discussed.
    });

    return redirect()->back()->with('success', 'Stocks received successfully!');
}
}