<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertas extends Model
{
    //se declara que tiene una regla de validación de los datos
    use HasFactory;
    //campos de asignación masima o editables
    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono', 'propiedades_id', 'oferta'];
    public function ofertas()
    {
        //definimos la relación inversa que existe con la tabla propiedades (una de muchas ofertas para cada propiedad)
        return $this->belongsTo(\App\Models\Propiedades::class, 'id', 'propiedades_id');
    }
}
