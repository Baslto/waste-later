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
        Schema::create('markets_stock', function (Blueprint $table) {
            $table->bigInteger('market_id');
            $table->bigInteger('product_id');
            $table->float('price');
            $table->float('price_reduced');
            $table->string('mhd');
            $table->integer('stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markets_stock');
    }
};
