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
        Schema::create('inventarios', function (Blueprint $table) {
    
            $table->increments("id");
            $table->string("Nombre");
            $table->string("Serial");
            $table->text("Descripcion");
            $table->string("Ubicacion");
            $table->string("Estado");
            $table->string("Precio");
            $table->date("Ultimo_Mantenimiento");
            $table->text('Recomentacion');
          
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
