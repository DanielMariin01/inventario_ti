<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario';
    protected $fillable = [
        'nombre',
        'cedula',
        'correo',
        'celular',
        'fk_cargo',
        'fk_area',
        'estado',
        'created_at',
        'updated_at',
        'created_by',
    ];    

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'fk_cargo', 'id_cargo');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'fk_area', 'id_area');
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


}
