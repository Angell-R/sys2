<?php

namespace App\Filament\Resources\OrdenesResource\Pages;

use App\Filament\Resources\OrdenesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrdenes extends CreateRecord
{
    protected static string $resource = OrdenesResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
