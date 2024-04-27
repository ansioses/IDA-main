<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;

    //campos que se pueden completar de forma masiva (formularios o seeders)
    protected $fillable = [
        'inmueble',
        'ruta'
    ];


    public function Imagenes()
    {
        //definimos la relación inversa que existe con la tabla propiedades (una de muchas imágenes para cada propiedad)
        return $this->belongsTo(\App\Models\Propiedades::class, 'id', 'inmueble');
    }
}
