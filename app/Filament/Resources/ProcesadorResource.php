<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcesadorResource\Pages;
use App\Filament\Resources\ProcesadorResource\RelationManagers;
use App\Models\Procesador;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcesadorResource extends Resource
{
    protected static ?string $model = Procesador::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre del Procesador'),
                Forms\Components\TextInput::make('velocidad')
                    ->required()
                    ->maxLength(255)
                    ->label('Velocidad del Procesador'),
                Forms\Components\TextInput::make('generacion')
                    ->required()
                    ->numeric()
                    ->label('Generación del Procesador'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_procesador')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre del Procesador'),
                Tables\Columns\TextColumn::make('velocidad')
                    ->label('Velocidad del Procesador'),
                Tables\Columns\TextColumn::make('generacion')
                    ->label('Generación del Procesador'),
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
            'index' => Pages\ListProcesadors::route('/'),
            'create' => Pages\CreateProcesador::route('/create'),
            'edit' => Pages\EditProcesador::route('/{record}/edit'),
        ];
    }
}
