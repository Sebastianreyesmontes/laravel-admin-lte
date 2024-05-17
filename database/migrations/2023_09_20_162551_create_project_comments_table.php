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
        Schema::create('project_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_process_id'); // Agrega una columna para relacionar con el proceso del proyecto
            $table->unsignedInteger('user_id'); // Agrega una columna para relacionar con los usuarios
            $table->text('comment');
            $table->timestamps();

            $table->foreign('project_process_id')->references('id')->on('project_processes');
            $table->foreign('user_id')->references('id')->on('users'); // Ajusta el nombre de la tabla de usuarios según tu configuración
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_comments');
    }
};
