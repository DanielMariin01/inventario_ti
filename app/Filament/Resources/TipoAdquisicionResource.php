<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoAdquisicionResource\Pages;
use App\Filament\Resources\TipoAdquisicionResource\RelationManagers;
use App\Models\Tipo_adquisicion;
use App\Models\TipoAdquisicion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoAdquisicionResource extends Resource
{
    protected static ?string $model = Tipo_adquisicion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_tipo')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre del Tipo de Adquisición'),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción del Tipo de Adquisición'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_tipo_adquisicion')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('nombre_tipo')
                    ->label('Nombre del Tipo de Adquisición'),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción del Tipo de Adquisición'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTipoAdquisicions::route('/'),
            'create' => Pages\CreateTipoAdquisicion::route('/create'),
            'edit' => Pages\EditTipoAdquisicion::route('/{record}/edit'),
        ];
    }
}
