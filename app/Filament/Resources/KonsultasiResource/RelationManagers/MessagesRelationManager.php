<?php

namespace App\Filament\Resources\KonsultasiResource\RelationManagers;

use App\Services\WhatsappService;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class MessagesRelationManager extends RelationManager
{
    protected static string $relationship = 'messages';

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('direction')->label('Arah')
                    ->badge()
                    ->color(fn ($state) => $state === 'in' ? 'primary' : 'success')
                    ->formatStateUsing(fn ($state) => $state === 'in' ? 'Masuk' : 'Keluar'),
                Tables\Columns\TextColumn::make('sender')->label('Dari'),
                Tables\Columns\TextColumn::make('message')->label('Pesan')->wrap(),
                Tables\Columns\TextColumn::make('created_at')->since()->label('Waktu'),
            ])
            ->headerActions([
                Tables\Actions\Action::make('Kirim Pesan')
                    ->form([
                        Forms\Components\Textarea::make('message')->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $wa = new WhatsappService();
                        $wa->sendMessage($this->ownerRecord, $data['message']);
                    }),
            ])
            ->defaultSort('created_at', 'asc');
    }
}
