<?php

namespace App\Filament\Resources\EmptecnicoResource\Pages;

use App\Filament\Resources\EmptecnicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmptecnicos extends ListRecords
{
    protected static string $resource = EmptecnicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
