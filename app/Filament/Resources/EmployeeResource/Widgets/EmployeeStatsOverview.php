<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\City;
use App\Models\Country;
use App\Models\Employee;
use App\Models\State;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $IN = Country::where('country_code', 'IN')->withCount('employees')->first();
        return [
            Card::make('All Employee', Employee::all()->count())
                ->icon('heroicon-s-users'),
            Card::make('All Countries', Country::all()->count()),
            Card::make('All States', State::all()->count()),
            Card::make('All Cities', City::all()->count()),
            Card::make($IN->name . ' Employees', $IN->employees_count)
                ->icon('heroicon-s-user')
                ->color('blue'),
        ];
    }
}
