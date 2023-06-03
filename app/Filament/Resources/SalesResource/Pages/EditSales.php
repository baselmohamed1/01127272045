<?php

namespace App\Filament\Resources\SalesResource\Pages;

use App\Filament\Resources\SalesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSales extends EditRecord
{
    protected static string $resource = SalesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
