<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryBatch;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockInController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::where('is_active', true)->get();
        // We get products with their units so the dropdown knows about Boxes/Cartons
        $products = Product::with('units')->get(); 
        
        return view('admin.inventory.currentstock', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'unit_type' => 'required', // "Base" or "Box" or "Carton"
            'quantity' => 'required|numeric|min:1',
            'free_quantity' => 'nullable|numeric|min:0',
            'total_cost' => 'required|numeric|min:0',
            'received_date' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            $product = Product::with('units')->find($request->product_id);
            
            // 1. RESOLVE MULTIPLIER (Convert Box to Sachets)
            $multiplier = 1;
            
            if ($request->unit_type !== 'base') {
                // Find the conversion factor for the selected unit (e.g. Box)
                $unit = $product->units->where('unit_name', $request->unit_type)->first();
                if ($unit) {
                    $multiplier = $unit->conversion_factor;
                }
            }

            // 2. CALCULATE TOTAL BASE UNITS
            $baseQtyPurchased = $request->quantity * $multiplier;
            $baseQtyFree = ($request->free_quantity ?? 0) * $multiplier;
            $totalBaseQty = $baseQtyPurchased + $baseQtyFree;

            // 3. CALCULATE EFFECTIVE COST
            // Example: Paid 1000 for 10 items + 2 free.
            // Effective Cost = 1000 / 12 = 83.33
            $effectiveCost = 0;
            if ($totalBaseQty > 0) {
                $effectiveCost = $request->total_cost / $totalBaseQty;
            }

            // 4. SAVE BATCH
            InventoryBatch::create([
                'product_id' => $product->id,
                'supplier_id' => $request->supplier_id,
                'quantity_purchased' => $baseQtyPurchased,
                'quantity_free' => $baseQtyFree,
                'total_quantity' => $totalBaseQty,
                'remaining_quantity' => $totalBaseQty, // Initially, remaining = total
                'supplier_price' => $request->total_cost, // Amount on receipt
                'total_cost' => $request->total_cost,
                'effective_cost_per_unit' => $effectiveCost,
                'received_date' => $request->received_date,
                'expiry_date' => $request->expiry_date,
                'batch_code' => $request->batch_code,
                'is_consignment' => $request->has('is_consignment'),
            ]);

            // Optional: Update Product's "Current Cost" to this latest batch cost
            $product->update(['unit_cost' => $effectiveCost]);
        });

        return redirect()->back()->with('success', 'Stocks received successfully!');
    }

    // public function showCurrentStock()
    // {
    //     // 2. Fetch all active suppliers
    //     $suppliers = Supplier::where('is_active', true)->get();

    //     // 3. Fetch products (you likely need this too for the table)
    //     $products = Product::with('units')->get();

    //     // 4. Pass the variables to the view using compact()
    //     return view('admin.inventory.currentstock', compact('suppliers', 'products'));
    // }
}