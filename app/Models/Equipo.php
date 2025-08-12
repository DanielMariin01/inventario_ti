<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipo';
    protected $primaryKey = 'id_equipo';


    protected $fillable = [
        'hostname',
        'nombre_usuario',
        'fk_tipo_equipo',
        'fk_marca',
        'fk_modelo',
        'fk_procesador',
        'fk_ram',
        'fk_memoria',
        'fk_disco_duro',
        'fk_sistema_operativo',
        'fk_tipo_adquisicion',
        'serial',
        'mac',
        'ip',
        'observacion',
        'estado_equipo',
        'fecha_ingreso',
        
    ];

    // Relaciones
    public function tipoEquipo()
    {
        return $this->belongsTo(tipo_equipo::class, 'fk_tipo_equipo', 'id_tipo_equipo');
    }
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'fk_marca', 'id_marca');
    }
    public function modelo()
    {
        return $this->belongsTo(Modelo::class, 'fk_modelo', 'id_modelo');
    }
    public function procesador()
    {
        return $this->belongsTo(Procesador::class, 'fk_procesador', 'id_procesador');
    }

       public function ram()
    {
        return $this->belongsTo(Ram::class, 'fk_ram', 'id_ram');
    }
    public function memoria()
    {       
        return $this->belongsTo(Memoria::class, 'fk_ram', 'id_memoria');
    }
    public function discoDuro()
    {
        return $this->belongsTo(Disco_duro::class, 'fk_disco_duro', 'id_disco_duro');
    }
    public function sistemaOperativo()
    {
        return $this->belongsTo(Sistema_operativo::class, 'fk_sistema_operativo', 'id_sistema_operativo');
    }
    public function tipoAdquisicion()
    {
        return $this->belongsTo(Tipo_adquisicion::class, 'fk_tipo_adquisicion', 'id_tipo_adquisicion');
    }
 
     

}
