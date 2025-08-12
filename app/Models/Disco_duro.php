<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disco_duro extends Model
{
    use HasFactory;

    protected $table = 'disco_duro';
    protected $primaryKey = 'id_disco_duro';
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
