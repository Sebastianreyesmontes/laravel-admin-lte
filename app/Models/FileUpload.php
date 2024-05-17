<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    // use HasFactory; SE USA PARA DATOS FALSOS O DE PRUEBA

    protected $fillable = ['file','name','area','prop','docs','arch','acciones'];

    use HasFactory;
}

