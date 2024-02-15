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
        Schema::create('order', function (Blueprint $table) {
            $table->string('order_id')->unique();
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->enum('order_status', ['Pending', 'On Progress', 'Paid', 'Delivered', 'Done', 'Cancel']);
            $table->integer('order_quantity');
            $table->integer('order_total');
            $table->date('order_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
