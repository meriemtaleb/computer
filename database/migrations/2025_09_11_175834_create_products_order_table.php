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
        
        Schema::create('products_order', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->unsigned()->default(1);
            $table->decimal('total_price',8,2);// the full price of each product not the whole order 
           $table->timestamps(); 
        });

    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('products_order');
        //
    }
};
