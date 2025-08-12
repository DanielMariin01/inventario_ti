<?php

namespace App\Filament\Resources\ProcesadorResource\Pages;

use App\Filament\Resources\ProcesadorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProcesador extends EditRecord
{
    protected static string $resource = ProcesadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
