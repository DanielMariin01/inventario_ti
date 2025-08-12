<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_adquisicion extends Model
{
    use HasFactory;

    protected $table = 'tipo_adquisicion';
    protected $primaryKey = 'id_tipo_adquisicion';
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
