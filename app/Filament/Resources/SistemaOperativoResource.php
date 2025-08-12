<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SistemaOperativoResource\Pages;
use App\Filament\Resources\SistemaOperativoResource\RelationManagers;
use App\Models\Sistema_operativo;
use App\Models\SistemaOperativo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SistemaOperativoResource extends Resource
{
    protected static ?string $model = Sistema_operativo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre del Sistema Operativo'),
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->maxLength(255)
                    ->label('Versión del Sistema Operativo'),
              
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_sistema_operativo')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre del Sistema Operativo'),
                Tables\Columns\TextColumn::make('version')
                    ->label('Versión del Sistema Operativo'),
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
            'index' => Pages\ListSistemaOperativos::route('/'),
            'create' => Pages\CreateSistemaOperativo::route('/create'),
            'edit' => Pages\EditSistemaOperativo::route('/{record}/edit'),
        ];
    }
}
