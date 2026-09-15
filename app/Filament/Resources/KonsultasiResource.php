<?php

namespace App\Filament\Resources;

use App\Filament\Exports\KonsultasiExporter;
use App\Filament\Resources\KonsultasiResource\RelationManagers\MessagesRelationManager;
use App\Filament\Resources\KonsultasiResource\Pages;
use App\Models\Konsultasi;
use App\Models\User;
use App\Services\WhatsAppService;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class KonsultasiResource extends Resource
{
    protected static ?string $model = Konsultasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('nomor_whatsapp')->required(),
                Forms\Components\Textarea::make('deskripsi_masalah')->required(),

                Forms\Components\FileUpload::make('file_path')
                    ->label('File Unggahan')
                    ->disabled()
                    ->downloadable()
                    ->visibleOn(['view', 'edit']),

                Forms\Components\DatePicker::make('tanggal_diajukan')->required(),
                Forms\Components\TimePicker::make('jam_diajukan')->required(),
                Forms\Components\Select::make('assigned_to_admin_id')
                    ->relationship('assignedToAdmin', 'name')
                    ->visibleOn(['edit']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'diterima' => 'success',
                        'dijadwal_ulang' => 'info',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('assignedToAdmin.name')
                    ->label('Admin yang Ditugaskan'),
            ])
            ->filters([
                Tables\Filters\Filter::make('tanggal_diajukan')
                    ->form([
                        Forms\Components\DatePicker::make('dari'),
                        Forms\Components\DatePicker::make('sampai'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_diajukan', '>=', $date),
                            )
                            ->when(
                                $data['sampai'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_diajukan', '<=', $date),
                            );
                    }),
            ])
            ->headerActions([
                Action::make('downloadPdf')
                    ->label('Unduh Laporan PDF')
                    ->tooltip('Unduh daftar konsultasi yang diterima atau dijadwal ulang.')
                    ->icon('heroicon-o-document-arrow-down')
                    ->form([
                        Fieldset::make('Pilih Rentang Tanggal')
                            ->schema([
                                DatePicker::make('start_date')
                                    ->label('Dari Tanggal')
                                    ->required()
                                    ->default(now()->startOfMonth()),
                                DatePicker::make('end_date')
                                    ->label('Sampai Tanggal')
                                    ->required()
                                    ->default(now()->endOfMonth()),
                            ]),
                    ])
                    ->action(function (array $data) {
                        $konsultasi = static::getEloquentQuery()
                            ->whereIn('status', ['diterima', 'dijadwal_ulang'])
                            ->whereBetween('tanggal_diajukan', [$data['start_date'], $data['end_date']])
                            ->get();

                        $pdf = PDF::loadView('pdf.daftar-konsultasi', [
                            'konsultasi' => $konsultasi,
                            'startDate' => $data['start_date'],
                            'endDate' => $data['end_date'],
                        ]);

                        $startDateFormatted = Carbon::parse($data['start_date'])->format('Y-m-d');
                        $endDateFormatted = Carbon::parse($data['end_date'])->format('Y-m-d');
                        $fileName = "jadwal-konsultasi_{$startDateFormatted}_sampai_{$endDateFormatted}.pdf";

                        return response()->streamDownload(function () use ($pdf) {
                            echo $pdf->output();
                        }, $fileName);
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('assign')
                    ->label('Assign')
                    ->visible(fn (): bool => Auth::user()->role === 'super_admin')
                    ->form([
                        Forms\Components\Select::make('admin_id')
                            ->label('Pilih Admin')
                            ->options(fn () => User::where('role', 'admin')->pluck('name', 'id'))
                            ->required(),
                    ])
                    ->action(function (array $data, Konsultasi $record): void {
                        $record->assigned_to_admin_id = $data['admin_id'];
                        $record->save();
                    }),
                Tables\Actions\Action::make('terima')
                    ->label('Terima')
                    ->visible(fn (Konsultasi $record): bool => Auth::user()->role === 'admin' && $record->assigned_to_admin_id === Auth::id() && $record->status === 'pending')
                    ->requiresConfirmation()
                    ->action(function (Konsultasi $record): void {
                        $record->status = 'diterima';
                        $record->save();

                        // Gunakan jadwal baru jika ada, jika tidak gunakan jadwal awal
                        $tanggalTampil = $record->tanggal_baru ?? $record->tanggal_diajukan;
                        $jamTampil = $record->jam_baru ?? $record->jam_diajukan;

                        // Format tanggal dengan Carbon untuk keamanan
                        $templateTerima = "Halo *$record->nama_lengkap*,\n\nKonsultasi Anda telah **diterima**.\n\nBerikut detail jadwalnya:\nTanggal: " . Carbon::parse($tanggalTampil)->format('d F Y') . "\nJam: " . $jamTampil . " WIB.\n\nTerima kasih.";

                        $waService = app(WhatsAppService::class);
                        $waService->kirimPesan($record->nomor_whatsapp, $templateTerima);
                    }),
                Tables\Actions\Action::make('reschedule')
                    ->label('Reschedule')
                    ->visible(fn (Konsultasi $record): bool => Auth::user()->role === 'admin' && $record->assigned_to_admin_id === Auth::id() && $record->status === 'pending')
                    ->requiresConfirmation()
                    ->form([
                        Forms\Components\DatePicker::make('tanggal_baru')->required(),
                        Forms\Components\TimePicker::make('jam_baru')->required(),
                    ])
                    ->action(function (array $data, Konsultasi $record): void {
                        $record->status = 'dijadwal_ulang';
                        $record->tanggal_baru = $data['tanggal_baru'];
                        $record->jam_baru = $data['jam_baru'];
                        $record->save();

                        // Format tanggal baru
                        $templateReschedule = "Halo *$record->nama_lengkap*,\n\nKonsultasi Anda telah **dijadwal ulang**.\n\nBerikut detail jadwal baru Anda:\nTanggal: " . Carbon::parse($data['tanggal_baru'])->format('d F Y') . "\nJam: " . $data['jam_baru'] . " WIB.\n\nMohon periksa kembali jadwal Anda. Terima kasih.";

                        $waService = app(WhatsAppService::class);
                        $waService->kirimPesan($record->nomor_whatsapp, $templateReschedule);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKonsultasis::route('/'),
            'create' => Pages\CreateKonsultasi::route('/create'),
            'edit' => Pages\EditKonsultasi::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::user()->role === 'super_admin';
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()->role === 'super_admin';
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (Auth::user()->role === 'admin') {
            $query->where('assigned_to_admin_id', Auth::id());
        }

        return $query;
    }

    public static function getRelations(): array
    {
        return [
            MessagesRelationManager::class,
        ];
    }
}