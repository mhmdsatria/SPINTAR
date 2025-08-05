<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class CekKolomKonsultasi extends Command
{
    protected $signature = 'cek:kolom-konsultasi';
    protected $description = 'Cek semua kolom dalam tabel konsultasis';

    public function handle()
    {
        $columns = Schema::getColumnListing('konsultasis');
        $this->info("Kolom dalam tabel konsultasis:");
        foreach ($columns as $col) {
            $this->line("- " . $col);
        }
    }
}
