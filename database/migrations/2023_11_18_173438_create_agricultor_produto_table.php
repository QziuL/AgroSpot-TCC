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
        Schema::create('agricultor_produto', function (Blueprint $table) {
            $table->foreignId('produto_id')->constrained('produtos');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('disponivel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agricultor_produto');
    }
};
