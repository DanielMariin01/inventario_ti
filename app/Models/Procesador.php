<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procesador extends Model
{
    use HasFactory;
    protected $table = 'procesador';
    protected $primaryKey = 'id_procesador';
    protected $fillable = [
        'nombre',
        'generacion',
        'velocidad',
        
    ];
}
