<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();

            // Perfil
            $table->string('display_name')->nullable();  // Nombre público
            $table->string('code')->nullable();          // Ej: BRO-001
            $table->string('whatsapp', 30)->nullable();  // SIN "+"

            // KPIs “cacheados”
            $table->unsignedInteger('active_lines')->default(0);
            $table->decimal('month_commission', 12, 2)->default(0);
            $table->decimal('sipab_balance', 12, 2)->default(0);

            // Preferencias
            $table->boolean('receive_push')->default(true);
            $table->boolean('receive_email')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('distributors');
    }
};
