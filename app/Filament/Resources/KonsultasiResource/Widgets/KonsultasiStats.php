<?php

namespace App\Filament\Resources\KonsultasiResource\Widgets;

use App\Models\Konsultasi;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Facades\Auth;

class KonsultasiStats extends BaseWidget
{
    protected function getCards(): array
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Query dasar untuk semua konsultasi
        $query = Konsultasi::query();

        // Jika user adalah 'admin', filter hanya yang ditugaskan kepadanya
        if ($user->role === 'admin') {
            $query->where('assigned_to_admin_id', $user->id);
        }

        // Hitung statistik
        $totalKonsultasi = $query->count();
        $pendingKonsultasi = $query->where('status', 'pending')->count();
        
        // Menghitung status 'diterima' dan 'dijadwal_ulang'
        $acceptedAndRescheduled = Konsultasi::query();
        if ($user->role === 'admin') {
            $acceptedAndRescheduled->where('assigned_to_admin_id', $user->id);
        }
        $acceptedAndRescheduled = $acceptedAndRescheduled->whereIn('status', ['diterima', 'dijadwal_ulang'])->count();

        return [
            Card::make('Total Konsultasi', $totalKonsultasi)
                ->description('Jumlah total semua konsultasi'),
            
            Card::make('Konsultasi Pending', $pendingKonsultasi)
                ->description('Jumlah konsultasi yang menunggu')
                ->color('warning'),
            
            Card::make('Konsultasi Diterima & Dijadwal Ulang', $acceptedAndRescheduled)
                ->description('Jumlah konsultasi yang sudah diproses')
                ->color('success'),
        ];
    }
}