<?php

namespace App\Filament\Widgets;

use App\Models\Aspirasi;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Mockery\Matcher\Any;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(User::where('role', 'admin')->count() . ' Admin', User::where('role', 'admin')->count())
               ->description('Banyak admin yang terdaftar'),
            Stat::make(User::where('role', 'siswa')->count() . ' Siswa', User::where('role', 'siswa')->count())
                ->description('Banyak siswa yang terdaftar'),
            Stat::make(User::count() . ' Users', User::count())
                ->description('Total pengguna terdaftar'),
            Stat::make(Aspirasi::count() . ' Aspirasi', Aspirasi::count())
                ->description('Total aspirasi yang diajukan')
                ->color('success'),
        ];
    }
}
