<?php

namespace App\Models;

use App\Models\InventoryBatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    public function category() { return $this->belongsTo(Category::class); }
    public function units() { return $this->hasMany(ProductUnit::class); }
    public function batches() { return $this->hasMany(InventoryBatch::class); }

    /**
     * 1. Get Total Stock Count (Base Units / Tingi)
     * e.g., Returns 3,940 (Kilos)
     */
    public function getOnHandAttribute()
    {
        return $this->batches()->where('remaining_quantity', '>', 0)->sum('remaining_quantity');
    }

    /**
     * 2. Calculate Weighted Average Cost
     * Formula: (Sum of Total Value of Stocks) / (Total Stocks)
     */
    public function getAvgCostAttribute()
    {
        $batches = $this->batches()->where('remaining_quantity', '>', 0)->get();
        
        if ($batches->isEmpty()) return 0;

        $totalValue = $batches->sum(fn($b) => $b->remaining_quantity * $b->effective_cost_per_unit);
        $totalQty = $batches->sum('remaining_quantity');

        return $totalQty > 0 ? ($totalValue / $totalQty) : 0;
    }

    /**
     * 3. Get Total Asset Value
     * e.g., Returns ₱ 138,372.12
     */
    public function getTotalAssetValueAttribute()
    {
        return $this->on_hand * $this->avg_cost;
    }

    /**
     * 4. Smart Stock Breakdown (The "Bag" vs "Kilo" logic)
     * Returns an array: ['major_name' => 'Bag', 'major_qty' => 78, 'minor_name' => 'Kilo', 'minor_qty' => 40]
     */
    public function getStockBreakdownAttribute()
    {
        $totalStock = $this->on_hand;
        
        // Find the largest unit (e.g. Bag/Sack)
        $largestUnit = $this->units()->orderBy('conversion_factor', 'desc')->first();

        if ($largestUnit && $largestUnit->conversion_factor > 1) {
            $majorQty = floor($totalStock / $largestUnit->conversion_factor);
            $minorQty = $totalStock % $largestUnit->conversion_factor;

            return [
                'major_name' => $largestUnit->unit_name,
                'major_qty'  => $majorQty,
                'minor_name' => $this->base_unit,
                'minor_qty'  => $minorQty,
            ];
        }

        // If no larger unit, everything is "On Hand"
        return [
            'major_name' => '-',
            'major_qty'  => '-',
            'minor_name' => $this->base_unit,
            'minor_qty'  => $totalStock,
        ];
    }
}