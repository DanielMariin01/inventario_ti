<?php

namespace App\Filament\Resources\TipoAdquisicionResource\Pages;

use App\Filament\Resources\TipoAdquisicionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipoAdquisicion extends EditRecord
{
    protected static string $resource = TipoAdquisicionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
