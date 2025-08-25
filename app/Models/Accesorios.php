<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorios extends Model
{
    use HasFactory;
    protected $table = 'accesorio';
    protected $primaryKey = 'id_accesorio';
    protected $fillable = [
        'nombre',
        'descripcion',
        'created_at',
        'updated_at',
    ];
}
