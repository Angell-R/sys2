<?php

namespace App\Filament\Resources\RevisionesResource\Pages;

use App\Filament\Resources\RevisionesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRevisiones extends CreateRecord
{
    protected static string $resource = RevisionesResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
