<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertas extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono', 'propiedades_id', 'oferta'];
    public function ofertas()
    {
        return $this->belongsTo(\App\Models\Propiedades::class, 'id', 'propiedades_id');
    }
}
