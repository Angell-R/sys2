<?php

namespace App\Filament\Resources\RevisionesResource\Pages;

use App\Filament\Resources\RevisionesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRevisiones extends ListRecords
{
    protected static string $resource = RevisionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
