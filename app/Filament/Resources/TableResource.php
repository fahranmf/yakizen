<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableResource\Pages;
use App\Filament\Resources\TableResource\RelationManagers;
use App\Models\Table as TableModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Table;


class TableResource extends Resource
{
    protected static ?string $model = TableModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';
    protected static ?string $navigationGroup = 'Manajemen Resto';
    protected static ?string $pluralLabel = 'Meja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('table_number')
                    ->label('Nomor Meja')
                    ->required()
                    ->maxLength(50),

                Forms\Components\Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'reserved' => 'Reserved',
                    ])
                    ->default('available')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('table_number')->label('Nomor Meja'),
                Tables\Columns\BadgeColumn::make('status')
                    ->formatStateUsing(fn($state) => ucfirst($state))
                    ->colors([
                        'success' => 'available',
                        'danger' => 'reserved',
                    ]),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    //     public static function table(Table $table): Table
// {
//     return $table
//         ->columns([
//             Tables\Columns\TextColumn::make('table_number')
//                 ->label('Nomor Meja')
//                 ->alignCenter(),

    //             Tables\Columns\BadgeColumn::make('status')
//                 ->alignCenter()
//                 ->colors([
//                     'success' => 'available',
//                     'danger' => 'reserved',
//                 ]),
//         ])
//         ->actions([
//             Tables\Actions\EditAction::make(),
//         ]);
// }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTables::route('/'),
            'create' => Pages\CreateTable::route('/create'),
            'edit' => Pages\EditTable::route('/{record}/edit'),
        ];
    }
}
