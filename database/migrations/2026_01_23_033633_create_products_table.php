<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            
            // 1. Basic Identity
            $table->string('name');         // e.g. "Roundup Herbicide"
            $table->string('brand')->nullable(); // e.g. "Monsanto"
            
            // 2. The BASE Unit (Smallest / Tingi)
            // Everything in the system is calculated based on this unit.
            $table->string('base_unit');    // e.g. "Sachet", "Kilo", "Piece"
            
            // 3. Current Pricing (For the Base Unit)
            $table->decimal('retail_price', 10, 2); // Current SRP per Sachet
            $table->decimal('unit_cost', 10, 2);    // Current Cost per Sachet
            
            // 4. Stock Settings
            $table->integer('alert_level')->default(10); // Warn if total sachets < 10
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};