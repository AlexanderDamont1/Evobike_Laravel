<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pieza extends Model
{
    use HasFactory;

    // Los campos que pueden ser asignados masivamente
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'cantidad',
        'limite_alerta'
    ];
}