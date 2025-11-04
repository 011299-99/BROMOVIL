<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            // 1. Quitamos las columnas del modelo "por product_id"
            if (Schema::hasColumn('cart_items', 'product_id')) {
                $table->dropForeign(['product_id']);
                $table->dropColumn('product_id');
            }
            if (Schema::hasColumn('cart_items', 'unit_price')) {
                $table->dropColumn('unit_price');
            }

            // 2. Agregamos las que usa tu controlador actual
            if (!Schema::hasColumn('cart_items', 'sku')) {
                $table->string('sku', 120)->index();
            }
            if (!Schema::hasColumn('cart_items', 'title')) {
                $table->string('title');
            }
            if (!Schema::hasColumn('cart_items', 'price')) {
                $table->decimal('price', 12, 2)->default(0);
            }
            if (!Schema::hasColumn('cart_items', 'subtotal')) {
                $table->decimal('subtotal', 12, 2)->default(0);
            }

            // 3. Evita duplicados por carrito + sku
            $table->unique(['cart_id', 'sku']);
        });
    }

    public function down(): void
    {
        Schema::table('cart_items', function (Blueprint $table) {
            // aquí podrías volver a poner product_id y unit_price si quisieras
        });
    }
};
