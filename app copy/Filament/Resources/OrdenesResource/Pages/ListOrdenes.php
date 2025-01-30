<?php

namespace App\Filament\Resources\OrdenesResource\Pages;

use App\Filament\Resources\OrdenesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrdenes extends ListRecords
{
    protected static string $resource = OrdenesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
