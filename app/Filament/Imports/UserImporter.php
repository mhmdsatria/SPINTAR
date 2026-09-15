<?php

namespace App\Filament\Imports;

use App\Models\User;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserImporter extends Importer
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email', 'unique:users,email']),
            ImportColumn::make('role')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('password')
                ->requiredMapping()
                ->fillRecordUsing(function (User $record, string $state): void {
                    $record->password = Hash::make($state);
                })
                ->rules(['required']),
        ];
    }
    public static function getCompletedNotificationBody(Import $import): string
    {
        return 'Import data user telah selesai!';
    }
}