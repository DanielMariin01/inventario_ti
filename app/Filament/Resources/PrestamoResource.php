<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestamoResource\Pages;
use App\Filament\Resources\PrestamoResource\RelationManagers;
use App\Models\Prestamo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrestamoResource extends Resource
{
    protected static ?string $model = Prestamo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Prestamo';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\Select::make('fk_equipo')
                    ->label('Equipo')
                    ->relationship('equipo', 'hostname') // Ajusta 'nombre' al campo que identifica el equipo
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('fk_funcionario')
                    ->label('Funcionario')
                    ->relationship('funcionario', 'nombre') // Ajusta 'nombre' si es otro campo
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('fecha_creacion')
                    ->label('Fecha de creación')
                    ->default(now())
                    ->required(),

                Forms\Components\Textarea::make('Observacion')
                    ->label('Observación')
                    ->maxLength(500)
                    ->rows(3),

                Forms\Components\Select::make('fk_sede')
                    ->label('Sede')
                    ->relationship('sede', 'nombre') // Ajusta el campo 'nombre' según tu tabla sede
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('fk_accesorio')
                    ->label('Accesorio')
                    ->relationship('accesorio', 'nombre') // Ajusta 'nombre' al campo identificador de accesorios
                    ->searchable()
                    ->nullable(),

                Forms\Components\TextInput::make('direccion')
                    ->label('Dirección')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\Hidden::make('created_by')
                    ->default(auth()->id())
                    ->dehydrated(fn (?int $state) => $state !== null)
                    ->required(),                                         

            ]);         
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               Tables\Columns\TextColumn::make('equipo.hostname')->label('Equipo'),
                Tables\Columns\TextColumn::make('funcionario.nombre')->label('Funcionario'),
                Tables\Columns\TextColumn::make('fecha_creacion')->label('Fecha')->date('d/m/Y'),
                Tables\Columns\TextColumn::make('sede.nombre')->label('Sede'),
                Tables\Columns\TextColumn::make('accesorio.nombre')->label('Accesorio'),
                Tables\Columns\TextColumn::make('direccion')->label('Dirección'),
                Tables\Columns\TextColumn::make('creador.name')->label('Creado por'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPrestamos::route('/'),
            'create' => Pages\CreatePrestamo::route('/create'),
            'edit' => Pages\EditPrestamo::route('/{record}/edit'),
        ];
    }
}
