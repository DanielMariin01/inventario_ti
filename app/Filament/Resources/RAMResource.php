<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RAMResource\Pages;
use App\Filament\Resources\RAMResource\RelationManagers;
use App\Models\RAM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RAMResource extends Resource
{
    protected static ?string $model = RAM::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre de la RAM'),
                Forms\Components\TextInput::make('capacidad')
                    ->required()
                    ->numeric()
                    ->label('Capacidad de la RAM (GB)'),
                Forms\Components\TextInput::make('frecuencia')
                    ->required()
                    ->maxLength(255)
                    ->label('Frecuencia de la RAM (MHz)'),
                //relacion con el modelo unidad
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
                Tables\Columns\TextColumn::make('id_ram')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre de la RAM'),
                Tables\Columns\TextColumn::make('capacidad')
                    ->label('Capacidad (GB)'),
                Tables\Columns\TextColumn::make('frecuencia')
                    ->label('Frecuencia (MHz)'),
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
            'index' => Pages\ListRAMS::route('/'),
            'create' => Pages\CreateRAM::route('/create'),
            'edit' => Pages\EditRAM::route('/{record}/edit'),
        ];
    }
}
