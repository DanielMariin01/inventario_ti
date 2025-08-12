<?php 

namespace App\Enums;



enum EstadoEquipo: string
{
    case DISPONIBLE = 'disponible';
    case ASIGNADO = 'asignado';

    case MANTENIMIENTO = 'mantenimiento';
    case DAÑADO = 'dañado';
    

 

    /**
     * Obtiene el nombre legible para el usuario de cada estado.
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::DISPONIBLE => 'disponible',
            self::ASIGNADO => 'asignado',
            self::MANTENIMIENTO => 'mantenimiento',
            self::DAÑADO => 'dañado',

        };
    }

    /**
     * Obtiene el color asociado a cada estado (útil para Filament).
     *
     * @return string|array|null
     */
    public function getColor(): string|array|null
    {
        return match ($this) {
       
          
            self::DISPONIBLE => 'success', // Verde
            self::ASIGNADO=> 'gray', // Rojo
            self::MANTENIMIENTO=> 'warning',
            self::DAÑADO=> 'danger',// Gris
         
        };
    }
    
}