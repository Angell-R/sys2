<?php

namespace App\Filament\Resources\OrdenesResource\Pages;

use App\Filament\Resources\OrdenesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrdenes extends EditRecord
{
    protected static string $resource = OrdenesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
