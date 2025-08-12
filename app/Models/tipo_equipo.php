<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_equipo extends Model
{
    use HasFactory;

    protected $table = 'tipo_equipo';
    protected $primaryKey = 'id_tipo_equipo';
    protected $fillable = [
        'nombre_tipo',
        'descripcion',
    ];
    
}
