<?php


namespace App\Filament\Widgets;


use App\Models\empresa;
use App\Models\emptecnico;
use App\Models\ordenes;
use App\Models\revisiones;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Empresas', empresa::query()->count())
            ->description(empresa::query()->count() < 1 ? 'Decremento' : 'Incremento')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success')
            ->descriptionIcon(empresa::query()->count() < 1 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up' ),

        Stat::make('Tecnicos', emptecnico::query()->count())
            ->description(emptecnico::query()->count() < 1 ? 'Decremento' : 'Incremento')
            ->descriptionIcon(emptecnico::query()->count() < 1 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up')
            ->chart(emptecnico::query()->count() < 1 ? [6, 1, 9, 7, 14, 2, 17] : [7, 2, 10, 8, 15, 4, 19])
            ->color('info'),

        Stat::make('Ordenes', ordenes::query()->count())
            ->description(ordenes::query()->count() < 1 ? 'Decremento' : 'Incremento')
            ->descriptionIcon(ordenes::query()->count() < 1 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up')
            ->chart(ordenes::query()->count() < 1 ? [6, 1, 9, 7, 14, 2, 17] : [7, 2, 10, 8, 15, 4, 19])
            ->color('danger'),

        // Stat::make('Revisiones', revisiones::query()->count())
        //     ->description(revisiones::query()->count() < 1 ? 'Decremento' : 'Incremento')
        //     ->descriptionIcon(revisiones::query()->count() < 1 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up')
        //     ->chart(revisiones::query()->count() < 1 ? [6, 1, 9, 7, 14, 2, 0] : [7, 2, 10, 8, 15, 4, 19])
        //     ->color('warning'),

            // Stat::make('fecha actual', date('l j F Y'))
        ];
    }
}
