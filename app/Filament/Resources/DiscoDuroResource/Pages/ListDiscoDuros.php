<?php

namespace App\Filament\Resources\DiscoDuroResource\Pages;

use App\Filament\Resources\DiscoDuroResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiscoDuros extends ListRecords
{
    protected static string $resource = DiscoDuroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
