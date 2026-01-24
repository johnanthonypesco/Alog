<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_xxxxxx_create_inventory_batches_table.php

public function up(): void
{
    Schema::create('inventory_batches', function (Blueprint $table) {
        $table->id();
        $table->foreignId('product_id')->constrained()->onDelete('cascade');
        $table->foreignId('supplier_id')->constrained(); // Link to the supplier you just made
        
        // 1. QUANTITY LOGIC (All in Base Units / Tingi)
        // If you bought 10 Sacks (50kg each), you save 500 here.
        // This makes math easy. The UI can show "10 Sacks" but DB sees "500 Kilos".
        $table->integer('quantity_purchased'); 
        $table->integer('quantity_free')->default(0); 
        $table->integer('total_quantity'); // Purchased + Free (This is the starting stock)
        
        $table->integer('remaining_quantity'); // This goes down as you sell items
        
        // 2. COSTING LOGIC (The "Effective Cost")
        $table->decimal('supplier_price', 10, 2); // The price on the receipt (e.g. 1000)
        $table->decimal('total_cost', 10, 2);     // The total amount you paid
        
        // The most important number: (Total Cost / Total Quantity)
        // Used to calculate true profit.
        $table->decimal('effective_cost_per_unit', 10, 2); 
        
        // 3. DATES & BATCH INFO
        $table->date('expiry_date')->nullable(); // Critical for chemicals/seeds
        $table->string('batch_code')->nullable(); // Supplier's batch number on the box
        $table->date('received_date');
        
        // 4. STATUS
        $table->boolean('is_consignment')->default(false);
        $table->boolean('is_paid')->default(false); // For consignment tracking
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_batches');
    }
};
