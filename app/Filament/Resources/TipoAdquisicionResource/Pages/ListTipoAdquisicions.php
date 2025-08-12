<?php

namespace App\Filament\Resources\TipoAdquisicionResource\Pages;

use App\Filament\Resources\TipoAdquisicionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipoAdquisicions extends ListRecords
{
    protected static string $resource = TipoAdquisicionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
