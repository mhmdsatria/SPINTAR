<?php

namespace App\Filament\Exports;

use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;

class UserExporter extends Exporter
{
    protected static ?string $model = \App\Models\User::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')
                ->label('Nama'),
            ExportColumn::make('email')
                ->label('Email'),
            ExportColumn::make('password')
                ->label('Password'),
            ExportColumn::make('role')
                ->label('Role'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        return 'Template Excel telah diunduh.';
    }
}
