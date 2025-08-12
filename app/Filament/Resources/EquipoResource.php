<?php

namespace App\Filament\Resources;

use App\Enums\EstadoEquipo;
use App\Filament\Resources\EquipoResource\Pages;
use App\Filament\Resources\EquipoResource\RelationManagers;
use App\Models\Equipo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;
use Filament\Tables\Columns\BadgeColumn;
class EquipoResource extends Resource
{
    protected static ?string $model = Equipo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('hostname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nombre_usuario')
                    ->required()
                    ->maxLength(255),
   Forms\Components\TextInput::make('serial')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mac')
                    ->required()
                    ->maxLength(255)
                    ->label('MAC'),
                Forms\Components\TextInput::make('ip')
                    ->required()
                    ->maxLength(255)
                    ->label('IP'),
                Forms\Components\Select::make('fk_tipo_equipo')
                    ->relationship('tipoEquipo', 'nombre_tipo')
                    ->required(),
            
                Forms\Components\Select::make('fk_marca')
                    ->relationship('marca', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_modelo')
                    ->relationship('modelo', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_procesador')
                    ->relationship('procesador', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_ram')
                    ->relationship('ram', 'nombre')
                    ->required()
                    ->Label('Memoria RAM'),
                Forms\Components\Select::make('fk_memoria')
                    ->relationship('memoria', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_disco_duro')
                    ->relationship('discoDuro', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_sistema_operativo')
                    ->relationship('sistemaOperativo', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_tipo_adquisicion')
                    ->relationship('tipoAdquisicion', 'nombre_tipo')
                    ->required(),
             Forms\Components\Select::make('estado_equipo')
                    ->label('Estado de Solicitud')
                    ->options(EstadoEquipo::class)
                    ->required()
                    ->native(false),
             
                Forms\Components\Textarea::make('observacion'),
                Forms\Components\DatePicker::make('fecha_ingreso')
                ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hostname')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_usuario')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('serial')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mac')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ip')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipoEquipo.nombre_tipo')
                    ->label('Tipo de Equipo'),
                Tables\Columns\TextColumn::make('marca.nombre'),
                Tables\Columns\TextColumn::make('modelo.nombre'),
                Tables\Columns\TextColumn::make('procesador.nombre'),
                Tables\Columns\TextColumn::make('ram.nombre')->label('Memoria RAM'),
                Tables\Columns\TextColumn::make('memoria.nombre'),
                Tables\Columns\TextColumn::make('discoDuro.nombre')->label('Disco Duro'),
                Tables\Columns\TextColumn::make('sistemaOperativo.nombre'),
                Tables\Columns\TextColumn::make('tipoAdquisicion.nombre_tipo')->label('Tipo de Adquisición'),
                BadgeColumn::make('estado_equipo')
                    ->label('Estado')
                    ->formatStateUsing(fn (string $state) => EstadoEquipo::from($state)->label())
                    ->color(fn (string $state) => EstadoEquipo::from($state)->getColor())
                    ->formatStateUsing(function ($state) {
                        try {
                            return EstadoEquipo::from($state)->label();
                        } catch (\ValueError $e) {
                            return $state;
                        }
                    }),
                          Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime(),
            ])
            ->filters([
                //filtro por serial
                
                
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
            'index' => Pages\ListEquipos::route('/'),
            'create' => Pages\CreateEquipo::route('/create'),
            'edit' => Pages\EditEquipo::route('/{record}/edit'),
        ];
    }
}
