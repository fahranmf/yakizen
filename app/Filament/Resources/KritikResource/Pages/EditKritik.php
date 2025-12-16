<?php

namespace App\Filament\Resources\KritikResource\Pages;

use App\Filament\Resources\KritikResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKritik extends EditRecord
{
    protected static string $resource = KritikResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
