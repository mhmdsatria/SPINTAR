<?php

namespace App\Filament\Exports;

use App\Models\Konsultasi;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\Models\ExportRecord;

class KonsultasiExporter extends Exporter
{
    protected static ?string $model = Konsultasi::class;

    public static function getColumns(): array
    {
        return [
            'nama' => 'Nama',
            'no_wa' => 'No. WA',
            'waktu_konsultasi' => 'Waktu Konsultasi',
            'tanggal_konsultasi' => 'Tanggal Konsultasi',
        ];
    }
    
    public function getRecords(): \Generator
    {
        $records = $this->getQuery()
                        ->whereNotNull('tanggal_konsultasi')
                        ->get();

        foreach ($records as $record) {
            yield new ExportRecord([
                'nama' => $record->user_name,
                'no_wa' => $record->user_phone,
                'waktu_konsultasi' => $record->waktu_konsultasi,
                'tanggal_konsultasi' => $record->tanggal_konsultasi,
            ]);
        }
    }
    
    public static function getCompletedNotificationBody(Export $export): string
    {
        return 'Jadwal konsultasi telah berhasil diunduh.';
    }
}