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
    Schema::create('suppliers', function (Blueprint $table) {
        $table->id();
        
        // 1. Company Info
        $table->string('name');
        $table->text('address')->nullable();
        $table->string('logo')->nullable();
        
        // 2. THE JSON COLUMN (Stores unlimited contacts & numbers)
        // Format: [{ "name": "Juan", "numbers": [{"label": "Globe", "no": "0917.."}] }]
        $table->json('contact_info')->nullable(); 
        
        // 3. Terms
        $table->boolean('is_consignment_provider')->default(false);
        $table->integer('default_term_days')->default(0); 
        $table->boolean('is_active')->default(true);
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
