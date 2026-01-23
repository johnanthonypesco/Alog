<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_product_units_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            
            // 1. Container Name
            $table->string('unit_name'); // e.g. "Box", "Carton"
            
            // 2. The Math (Normalized to Base)
            // Example: If 1 Carton = 10 Boxes, and 1 Box = 25 Sachets
            // Then this row stores: Name="Carton", Factor=250 (10*25)
            // This makes inventory deduction instant (Carton Sold = Minus 250 stock).
            $table->integer('conversion_factor'); 
            
            // 3. Special Wholesale Pricing (Optional)
            // If the whole box is cheaper than buying 25 sachets individually.
            $table->decimal('wholesale_price', 10, 2)->nullable(); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_units');
    }
};