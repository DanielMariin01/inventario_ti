<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    use HasFactory;

    protected $table = 'ram';
    protected $primaryKey = 'id_ram';
    protected $fillable = [
        'nombre',
        'capacidad',
        'fk_unidad',
        'frecuencia',
    ];


    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'fk_unidad', 'id_unidad');
    }
}
