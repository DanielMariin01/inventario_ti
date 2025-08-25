<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudad';
    protected $primaryKey = 'id_ciudad';
    protected $fillable = [
        'nombre',
        'created_at',
        'updated_at',
    ];
}
