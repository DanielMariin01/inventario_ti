<?php

namespace App\Filament\Resources\AccesoriosResource\Pages;

use App\Filament\Resources\AccesoriosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccesorios extends EditRecord
{
    protected static string $resource = AccesoriosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
