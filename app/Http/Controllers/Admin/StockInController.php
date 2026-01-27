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
            'unit_type' => 'required', // "Base" or "Box" or "Carton"
            'quantity' => 'required|numeric|min:1', // Qty PURCHASED (Paid)
            'free_quantity' => 'nullable|numeric|min:0', // Qty FREE
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

            // 2. CALCULATE QUANTITIES
            $baseQtyPurchased = $request->quantity * $multiplier; // The items you PAID for
            $baseQtyFree = ($request->free_quantity ?? 0) * $multiplier; // The items you got for FREE
            $totalBaseQty = $baseQtyPurchased + $baseQtyFree; // Total items in stock

            // 3. CALCULATE COSTS
            
            // A. List Cost Snapshot (Supplier's Official Price)
            // Formula: Total Paid / Purchased Qty (Ignore free items)
            $unitCostSnapshot = 0;
            if ($baseQtyPurchased > 0) {
                $unitCostSnapshot = $request->total_cost / $baseQtyPurchased;
            }

            // B. Effective Cost (Real Cost with Freebies)
            // Formula: Total Paid / Total Qty (Purchased + Free)
            $effectiveCost = 0;
            if ($totalBaseQty > 0) {
                $effectiveCost = $request->total_cost / $totalBaseQty;
            }

            // 4. CALCULATE DUE DATE (If Consignment)
            $dueDate = null;
            if ($request->has('is_consignment')) {
                $supplier = Supplier::find($request->supplier_id);
                // If supplier has terms (e.g. 30 days), add to received date
                if ($supplier && $supplier->default_term_days > 0) {
                    $dueDate = Carbon::parse($request->received_date)->addDays($supplier->default_term_days);
                }
            }

            // 5. SAVE BATCH
            InventoryBatch::create([
                'product_id' => $product->id,
                'supplier_id' => $request->supplier_id,
                
                // Quantity Logic
                'quantity_purchased' => $baseQtyPurchased,
                'quantity_free' => $baseQtyFree,
                'total_quantity' => $totalBaseQty,
                'remaining_quantity' => $totalBaseQty, // Initially full
                
                // Costing Logic
                'supplier_price' => $request->total_cost, // Total Receipt Amount
                'total_cost' => $request->total_cost,
                
                'unit_cost_snapshot' => $unitCostSnapshot,   // <--- SAVES LIST PRICE (e.g. 10.00)
                'effective_cost_per_unit' => $effectiveCost, // <--- SAVES REAL COST (e.g. 9.09)
                'srp_snapshot' => $product->retail_price,    // <--- SAVES SELLING PRICE
                
                // Dates & Codes
                'received_date' => $request->received_date,
                'expiry_date' => $request->expiry_date,
                'batch_code' => $request->batch_code,
                
                // Status
                'is_consignment' => $request->has('is_consignment'),
                'due_date' => $dueDate,
            ]);

            // Optional: Update Product's "Current Cost" to this latest effective cost
            $product->update(['unit_cost' => $effectiveCost]);
        });

        return redirect()->back()->with('success', 'Stocks received successfully!');
    }
}