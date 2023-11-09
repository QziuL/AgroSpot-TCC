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
        Schema::create('agricultors', function (Blueprint $table) {
            //$table->id();
            // $table->string('name');
            // $table->string('phone', 15);
            // $table->string('password');
            // $table->string('email');
             //$table->timestamp('email_verified_at')->nullable();
            $table->foreignId('user_id')->constrained('users')->primary();
            $table->string('cpf', 11);
            $table->string('cep');
            $table->string('cidade', 50);
            $table->string('nome_propriedade', 250);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agricultors');
    }
};
