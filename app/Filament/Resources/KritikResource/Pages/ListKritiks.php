<?php

namespace App\Filament\Resources\KritikResource\Pages;

use App\Filament\Resources\KritikResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKritiks extends ListRecords
{
    protected static string $resource = KritikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
