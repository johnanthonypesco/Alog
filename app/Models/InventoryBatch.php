<?php

// app/Models/InventoryBatch.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryBatch extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Helper: Calculate Effective Cost
    public static function calculateEffectiveCost($totalCost, $qtyPurchased, $qtyFree)
    {
        $totalQty = $qtyPurchased + $qtyFree;
        
        if ($totalQty <= 0) return 0;
        
        return $totalCost / $totalQty;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    
    // Scopes for easy querying
    public function scopeAvailable($query)
    {
        return $query->where('remaining_quantity', '>', 0)->orderBy('received_date', 'asc'); // FIFO
    }
}