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
        Schema::create('file_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string('area');
            $table->string('prop');
            $table->string('docs');
            $table->string('arch');
            $table->string('extension');
            $table->string('filepath')->default('archivos/')->nullable();  //Es la carpeta que se crea para guarda los archivos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_uploads');
    }
};
