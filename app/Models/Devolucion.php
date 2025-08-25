<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    use HasFactory;

    protected $table = 'devolucion';
    protected $primaryKey = 'id_devolucion';
    protected $fillable = [
        'fk_prestamo',
        'fecha_devolucion',
        'estado',
        'Observacion',     
        'created_by',            
        'created_at',
        'updated_at',
    ];         
    
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class, 'fk_prestamo', 'id_prestamo');
    }   

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    protected $casts = [
    'estado' => \App\Enums\EstadoDevolucion::class,
    ];
        
}
