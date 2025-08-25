<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevolucionResource\Pages;
use App\Filament\Resources\DevolucionResource\RelationManagers;
use App\Models\Devolucion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DevolucionResource extends Resource
{
    protected static ?string $model = Devolucion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Devolución';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('fk_prestamo')
                    ->label('Préstamo')
                    ->relationship('prestamo', 'id_prestamo') // Muestra ID, puedes cambiarlo por un campo más descriptivo
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('fecha_devolucion')
                    ->label('Fecha de devolución')
                    ->default(now())
                    ->required(),

                Forms\Components\Select::make('estado')
                ->label('Estado')
                ->options(\App\Enums\EstadoDevolucion::options())
                ->required(),


                Forms\Components\Textarea::make('Observacion')
                    ->label('Observación')
                    ->rows(3)
                    ->maxLength(500)
                    ->nullable(),

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
                Tables\Columns\TextColumn::make('prestamo.id_prestamo')
                    ->label('Préstamo')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('fecha_devolucion')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('estado')
                    ->label('Estado')
                    ->badge()
                    ->colors([
                        'warning' => 'pendiente',
                        'success' => 'completado',
                        'danger' => 'cancelado',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('Observacion')
                    ->label('Observación')
                    ->limit(30)
                    ->wrap(),

                Tables\Columns\TextColumn::make('creador.name')
                    ->label('Creado por')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
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
            'index' => Pages\ListDevolucions::route('/'),
            'create' => Pages\CreateDevolucion::route('/create'),
            'edit' => Pages\EditDevolucion::route('/{record}/edit'),
        ];
    }
}
