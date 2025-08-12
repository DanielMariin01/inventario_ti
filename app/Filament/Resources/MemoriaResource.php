<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemoriaResource\Pages;
use App\Filament\Resources\MemoriaResource\RelationManagers;
use App\Models\Memoria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemoriaResource extends Resource
{
    protected static ?string $model = Memoria::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre de la Memoria'),
                Forms\Components\TextInput::make('capacidad')
                    ->required()
                    ->maxLength(255)
                    ->label('Capacidad de la Memoria'),
                  Forms\Components\Select::make('fk_unidad')
                    ->relationship('unidad', 'nombre')
                    ->label('Unidad de Medida')
                    ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_memoria')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre de la Memoria'),
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
            'index' => Pages\ListMemorias::route('/'),
            'create' => Pages\CreateMemoria::route('/create'),
            'edit' => Pages\EditMemoria::route('/{record}/edit'),
        ];
    }
}
