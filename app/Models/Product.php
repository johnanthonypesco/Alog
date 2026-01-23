<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'brand',
        'base_unit',
        'retail_price',
        'unit_cost',
        'alert_level',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: A Product has many larger container sizes
    public function units()
    {
        return $this->hasMany(ProductUnit::class);
    }

    // app/Models/Product.php

public function getStockLabelAttribute()
{
    // 1. Get the total stock (Assume you fetch this from your inventory batch table)
    // For now, let's pretend we have a column 'total_stock' or use a temporary number.
    $totalStock = $this->total_stock ?? 0; // e.g., 251 sachets

    // 2. Check if this product has larger containers
    // We sort by conversion_factor DESC (Largest unit first: Carton -> Box)
    $largestUnit = $this->units()->orderBy('conversion_factor', 'desc')->first();

    if ($largestUnit) {
        $factor = $largestUnit->conversion_factor; // e.g., 240 (Carton) or 10 (Box)
        
        // INTEGER DIVISION: How many whole big units do we have?
        $bigUnitsCount = floor($totalStock / $factor); // 251 / 10 = 25 Boxes
        
        // MODULO: What is left over?
        $remainder = $totalStock % $factor; // 251 % 10 = 1 Sachet
        
        // 3. Format the Output
        if ($bigUnitsCount > 0 && $remainder > 0) {
            return "{$bigUnitsCount} {$largestUnit->unit_name}(s) & {$remainder} {$this->base_unit}(s)";
        } elseif ($bigUnitsCount > 0) {
            return "{$bigUnitsCount} {$largestUnit->unit_name}(s)";
        }
    }

    // Default: Just show base unit if no larger container exists or stock is small
    return "{$totalStock} {$this->base_unit}(s)";
}
}