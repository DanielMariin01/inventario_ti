<?php

namespace App\Filament\Resources\SistemaOperativoResource\Pages;

use App\Filament\Resources\SistemaOperativoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSistemaOperativo extends EditRecord
{
    protected static string $resource = SistemaOperativoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
