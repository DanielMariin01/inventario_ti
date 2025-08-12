<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscoDuroResource\Pages;
use App\Filament\Resources\DiscoDuroResource\RelationManagers;
use App\Models\Disco_duro;
use App\Models\DiscoDuro;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscoDuroResource extends Resource
{
    protected static ?string $model = Disco_duro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre del Disco Duro'),
                Forms\Components\TextInput::make('capacidad')
                    ->required()
                    ->maxLength(255)
                    ->label('Capacidad del Disco Duro'),
                Forms\Components\Select::make('fk_unidad')
                    ->relationship('unidad', 'nombre')
                    ->required()
                    ->label('Unidad de Medida'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_disco_duro')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre del Disco Duro'),
                Tables\Columns\TextColumn::make('capacidad')
                    ->label('Capacidad'),
                Tables\Columns\TextColumn::make('unidad.nombre')
                    ->label('Unidad de Medida'),
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
            'index' => Pages\ListDiscoDuros::route('/'),
            'create' => Pages\CreateDiscoDuro::route('/create'),
            'edit' => Pages\EditDiscoDuro::route('/{record}/edit'),
        ];
    }
}
