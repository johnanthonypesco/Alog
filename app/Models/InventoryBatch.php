<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryBatch extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * THIS IS THE CRITICAL FIX
     * Automatically converts database date strings into Carbon objects
     * allowing you to use ->format('M d, Y') in Blade.
     */
    protected $casts = [
        'received_date' => 'date',
        'expiry_date'   => 'date',
        'due_date'      => 'date',
        'is_consignment'=> 'boolean',
        'is_paid'       => 'boolean',
    ];

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