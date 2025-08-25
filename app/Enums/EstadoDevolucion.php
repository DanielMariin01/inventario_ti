<?php

namespace App\Enums;

enum EstadoDevolucion: string
{
    case PENDIENTE = 'pendiente';
    case DEVUELTO = 'devuelto';
    case DANADO = 'dañado';

    public function label(): string
    {
        return match ($this) {
            self::PENDIENTE => 'Pendiente',
            self::DEVUELTO => 'Devuelto',
            self::DANADO => 'Dañado',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label()
        ])->toArray();
    }
}
