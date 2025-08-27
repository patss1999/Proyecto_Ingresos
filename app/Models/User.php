<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'documento',
        'email',
        'telefono',
        'password',
        'rol_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relaciones
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function articulos()
    {
        return $this->hasMany(Articulo::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }
}
