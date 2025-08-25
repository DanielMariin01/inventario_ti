<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FuncionarioResource\Pages;
use App\Filament\Resources\FuncionarioResource\RelationManagers;
use App\Models\Funcionario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FuncionarioResource extends Resource
{
    protected static ?string $model = Funcionario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Funcionario';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cedula')
                    ->required(),
                Forms\Components\TextInput::make('correo')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('celular')
                    ->required()
                    ->maxLength(20),
                Forms\Components\Select::make('fk_cargo')
                    ->label('Cargo')
                    ->relationship('cargo', 'nombre')
                    ->required(),
                Forms\Components\Select::make('fk_area')
                    ->label('Area')
                    ->relationship('area', 'nombre')
                    ->required(),
                Forms\Components\Toggle::make('estado')
                    ->label('Estado')
                    ->default(true)
                    ->onColor('success')
                    ->offColor('danger'),
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
                Tables\Columns\TextColumn::make('nombre')->label('Nombre'),
                Tables\Columns\TextColumn::make('cedula')->label('Cédula'),
                Tables\Columns\TextColumn::make('correo'),
                Tables\Columns\TextColumn::make('celular'),
                Tables\Columns\TextColumn::make('cargo.nombre')->label('Cargo'),
                Tables\Columns\TextColumn::make('area.nombre')->label('Área'),
                Tables\Columns\BooleanColumn::make('estado')->label('Activo'),
                Tables\Columns\TextColumn::make('creador.name') // ✅ relación correcta
                    ->label('Creado por')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado el')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
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
            'index' => Pages\ListFuncionarios::route('/'),
            'create' => Pages\CreateFuncionario::route('/create'),
            'edit' => Pages\EditFuncionario::route('/{record}/edit'),
        ];
    }
}
