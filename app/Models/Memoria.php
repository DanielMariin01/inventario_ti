<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memoria extends Model
{
    use HasFactory;

    protected $table = 'memoria';
    protected $primaryKey = 'id_memoria';
    protected $fillable = [
        'nombre',
        'capacidad',
        'fk_unidad',
    ];


    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'fk_unidad', 'id_unidad');
    }
}
