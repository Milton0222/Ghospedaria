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
        Schema::create('requisicoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospede');
            $table->unsignedBigInteger('quarto');
            $table->unsignedBigInteger('funcionario')->nullable();
            $table->integer('duracao')->default(0);
            $table->enum('estadia',['hora','dia']);
            $table->float('apagar')->default(0);
            $table->date('data_hospedagem');

            $table->foreign('hospede')->references('id')->on('hospedes')->onUpdate('cascade');
            $table->foreign('quarto')->references('id')->on('quartos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('funcionario')->references('id')->on('users')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisicoes');
    }
};
