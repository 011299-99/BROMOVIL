<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    if (!Schema::hasTable('cart_items')) {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->cascadeOnDelete();
            $table->string('sku', 120)->index();
            $table->string('title');
            $table->unsignedInteger('qty')->default(1);
            $table->decimal('price', 12, 2);
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();

            $table->unique(['cart_id','sku']);
        });
    }
}

public function down(): void
{
    if (Schema::hasTable('cart_items')) {
        Schema::dropIfExists('cart_items');
    }
}
};
