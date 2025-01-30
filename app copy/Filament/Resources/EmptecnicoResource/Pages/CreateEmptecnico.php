<?php

namespace App\Filament\Resources\EmptecnicoResource\Pages;

use App\Filament\Resources\EmptecnicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEmptecnico extends CreateRecord
{
    protected static string $resource = EmptecnicoResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
