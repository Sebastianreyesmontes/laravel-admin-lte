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
        Schema::create('project_processes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id'); // Agrega una columna para relacionar con el proyecto principal
            $table->string('name');
            $table->string('description');
            $table->string('stage')->default('Planificacion'); // Etapa del proceso, puede ser diferente del proyecto principal
            $table->string('file_path')->default('Proyectos/')->nullable();
            $table->timestamps();
        
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_processes');
    }
};
