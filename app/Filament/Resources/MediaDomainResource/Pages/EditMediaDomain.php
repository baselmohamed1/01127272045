<?php

namespace App\Filament\Resources\MediaDomainResource\Pages;

use App\Filament\Resources\MediaDomainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaDomain extends EditRecord
{
    protected static string $resource = MediaDomainResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
