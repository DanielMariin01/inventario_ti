<?php

namespace App\Filament\Resources\AccesoriosResource\Pages;

use App\Filament\Resources\AccesoriosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccesorios extends ListRecords
{
    protected static string $resource = AccesoriosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
