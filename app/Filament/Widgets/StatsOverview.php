<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\Content;
use App\Models\Server;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Users',User::count()),

            Card::make('Contents', Content::count()),

            Card::make('Servers',Server::count()),
        ];
    }
}
