<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $table = 'sede';
    protected $primaryKey = 'id_sede';
    protected $fillable = [
        'fk_ciudad',
        'nombre',
        'created_at',
        'updated_at',
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'fk_ciudad', 'id_ciudad');
    }
}
