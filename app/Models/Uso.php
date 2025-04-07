<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uso extends Model
{
    protected $fillable = ['pieza_id', 'cantidad_utilizada', 'area'];

    public function pieza()
    {
        return $this->belongsTo(Pieza::class);
    }
}
