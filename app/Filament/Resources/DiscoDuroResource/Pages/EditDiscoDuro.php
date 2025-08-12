<?php

namespace App\Filament\Resources\DiscoDuroResource\Pages;

use App\Filament\Resources\DiscoDuroResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiscoDuro extends EditRecord
{
    protected static string $resource = DiscoDuroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
