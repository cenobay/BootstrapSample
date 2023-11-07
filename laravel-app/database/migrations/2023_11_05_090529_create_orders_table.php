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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('buyer_name');
            $table->unsignedBigInteger('quantity');
            $table->bigInteger('price');
            $table->unsignedBigInteger('mobile_number');
            $table->unsignedBigInteger('product_id'); // Foreign key column

            // Define the foreign key constraint
            $table->foreign('product_id')->references('id')->on('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['product_id']);
        });

        Schema::dropIfExists('orders');
    }
};
