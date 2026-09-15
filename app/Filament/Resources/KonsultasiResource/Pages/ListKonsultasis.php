<?php

namespace App\Filament\Resources\KonsultasiResource\Pages;

use App\Filament\Resources\KonsultasiResource;
use App\Filament\Resources\KonsultasiResource\Widgets\KonsultasiStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use app\app\Filament\Resources\KonsultasiResource\Widgets;

class ListKonsultasis extends ListRecords
{
    protected static string $resource = KonsultasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            //KonsultasiStats::class,
        ];
    }
}
