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
        // Stores the SRP at the moment of Stock In
        $table->decimal('srp_snapshot', 10, 2)->after('effective_cost_per_unit')->nullable();
    });
}

public function down(): void
{
    Schema::table('inventory_batches', function (Blueprint $table) {
        $table->dropColumn('srp_snapshot');
    });
}

    /**
     * Reverse the migrations.
     */
  
};
