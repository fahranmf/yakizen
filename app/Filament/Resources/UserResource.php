<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Manajemen Pengunjung';

    protected static ?string $navigationLabel = 'Customers';
    protected static ?string $navigationIcon = 'heroicon-o-users';


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', 'customer')
            ->withMax('orders', 'created_at');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),

                TextInput::make('email')
                    ->email()
                    ->required(),

                TextInput::make('no_telp')
                    ->required(),

                Select::make('role')
                    ->options([
                        'customer' => 'Customer',
                    ])
                    ->disabled(), // biar ga diubah admin
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('no_telp')
                    ->label('No. Telp')
                    ->formatStateUsing(fn($state) => $state ?: '-'),

                Tables\Columns\TextColumn::make('orders_max_created_at')
                    ->label('Last Order')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->formatStateUsing(fn($state) => $state ? \Carbon\Carbon::parse($state)->format('d M Y H:i') : '-'),


                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registered')
                    ->dateTime('d M Y'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
