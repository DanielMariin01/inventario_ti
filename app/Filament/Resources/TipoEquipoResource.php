<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipoEquipoResource\Pages;
use App\Filament\Resources\TipoEquipoResource\RelationManagers;
use App\Models\tipo_equipo;
use App\Models\TipoEquipo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TipoEquipoResource extends Resource
{
    protected static ?string $model = tipo_equipo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_tipo')
                    ->required()
                    ->maxLength(255)
                    ->label('Nombre del Tipo de Equipo'),
                Forms\Components\Textarea::make('descripcion')
      
                    ->label('Descripción del Tipo de Equipo'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_tipo_equipo')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('nombre_tipo')
                    ->label('Nombre del Tipo de Equipo'),
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción del Tipo de Equipo'),
                          Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime(),
            ])->filters([
                //
            ])->actions([
                Tables\Actions\EditAction::make(),
            ])->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
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
            'index' => Pages\ListTipoEquipos::route('/'),
            'create' => Pages\CreateTipoEquipo::route('/create'),
            'edit' => Pages\EditTipoEquipo::route('/{record}/edit'),
        ];
    }
}
