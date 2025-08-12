<?php

namespace App\Filament\Resources\MemoriaResource\Pages;

use App\Filament\Resources\MemoriaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemorias extends ListRecords
{
    protected static string $resource = MemoriaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
