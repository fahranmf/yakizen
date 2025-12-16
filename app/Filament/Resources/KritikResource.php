<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KritikResource\Pages;
use App\Filament\Resources\KritikResource\RelationManagers;
use App\Models\Kritik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KritikResource extends Resource
{
    protected static ?string $model = Kritik::class;
    protected static ?string $navigationGroup = 'Manajemen Pengunjung';
    protected static ?string $navigationLabel = 'Kritik';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';


    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama User')
                    ->searchable(),

                TextColumn::make('pesan')
                    ->label('Pesan Kritik')
                    ->limit(50)
                    ->wrap(),

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListKritiks::route('/'),
        ];
    }
}
