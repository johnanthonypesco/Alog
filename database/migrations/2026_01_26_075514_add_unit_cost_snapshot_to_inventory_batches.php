<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::table('inventory_batches', function (Blueprint $table) {
        // This stores the "List Price" (e.g., 100.00) before free items calculation
        $table->decimal('unit_cost_snapshot', 10, 2)->after('supplier_price')->nullable();
    });
}

public function down(): void
{
    Schema::table('inventory_batches', function (Blueprint $table) {
        $table->dropColumn('unit_cost_snapshot');
    });
}
};
