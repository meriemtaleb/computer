<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
 

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price',8,2);
            $table->string('category');
            $table->integer('stock');
            $table->string('status'); // it mean the status of the pc (new or used )
            $table->string('cpu');
            $table->string('gpu');
            $table->string('ram');
            $table->string('storage');
            $table->string('screen');
            $table->string('battery');
            $table->string('charger');
            $table->string('keybored');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
