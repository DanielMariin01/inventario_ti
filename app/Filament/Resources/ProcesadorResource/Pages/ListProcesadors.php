<?php

namespace App\Filament\Resources\ProcesadorResource\Pages;

use App\Filament\Resources\ProcesadorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProcesadors extends ListRecords
{
    protected static string $resource = ProcesadorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
