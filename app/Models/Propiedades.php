<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Propiedade
 *
 * @property $id
 * @property $titulo
 * @property $descripcion
 * @property $precio
 * @property $direccion
 * @property $client_id
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Bid[] $bids
 * @property Mensaje[] $mensajes
 * @property UserPropiedad[] $userPropiedads
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Propiedades extends Model
{

    use HasFactory;

    protected $perPage = 20;


    //campos que se pueden completar de forma masiva o a través de formularios
    protected $fillable = ['titulo', 'descripcion', 'precio', 'direccion', 'cliente_id', 'habitaciones', 'WC', 'plantas', 'tipo', 'size'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientes()
    {
        //definimos la relación inversa que existe con la tabla propiedades (una de muchas propiedades para cada cliente)
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bids()
    {
        //relación directa de uno a muchos
        return $this->hasMany(\App\Models\Bid::class, 'id', 'propiedad_id');
    }
    public function ofertas()
    {
        //relación directa de uno a muchos
        return $this->hasMany(\App\Models\ofertas::class, 'id', 'propiedad_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagenes()
    {
        //relación directa de uno a muchos
        return $this->hasMany(\App\Models\Imagenes::class, 'id', 'propiedad_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mensajes()
    {
        return $this->hasMany(\App\Models\Mensaje::class, 'id', 'propiedad_id');
    }
}
