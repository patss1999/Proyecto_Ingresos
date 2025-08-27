<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cantidad',
        'estado', // dentro | fuera
        'user_id',
        'visitante_id',
        'fecha_ingreso',
        'fecha_salida'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visitante()
    {
        return $this->belongsTo(Visitante::class);
    }
}
