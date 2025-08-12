<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistema_operativo extends Model
{
    use HasFactory;

    protected $table = 'sistema_operativo';
    protected $primaryKey = 'id_sistema_operativo';
    protected $fillable = [
        'nombre',
        'version',
       
    ];  
}
