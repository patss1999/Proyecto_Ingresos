<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'documento',
        'email',
        'telefono',
        'ocupacion',
        'fin_actividades',
        'password'
    ];

    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }
}
