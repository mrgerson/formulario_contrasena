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
        Schema::create('password_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->enum('area_dependencia', [
                'Talento Humano',
                'Tecnología / Sistemas',
                'Comercial',
                'Administración',
                'Operaciones',
                'Otro'
            ]);
            $table->string('correo_corporativo')->unique();
            $table->text('propuesta_password');
            $table->text('explicacion_tecnica');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_proposals');
    }
};
