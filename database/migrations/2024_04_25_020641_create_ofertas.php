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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->string('nombre');
            $table->text('apellidos');
            $table->bigInteger('oferta');
            $table->string('direccion');
            $table->bigInteger('telefono');
            $table->unsignedBigInteger('propiedad_id')->nullable();
            $table->foreign('propiedad_id')->references('id')->on('propiedades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
