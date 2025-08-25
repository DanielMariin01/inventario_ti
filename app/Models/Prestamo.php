<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamo';

    protected $primaryKey = 'id_prestamo';
    protected $fillable = [
        'fk_equipo',
        'fk_funcionario',
        'fecha_creacion',
        'Observacion',
        'fk_sede',
        'fk_accesorio',
        'direccion',
        'created_at',
        'updated_at',
        'created_by',
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'fk_equipo', 'id_equipo');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'fk_funcionario', 'id_funcionario');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_sede', 'id_sede');
    }
    public function accesorio()
    {
        return $this->belongsTo(Accesorios::class, 'fk_accesorio', 'id_accesorio');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    

}   
