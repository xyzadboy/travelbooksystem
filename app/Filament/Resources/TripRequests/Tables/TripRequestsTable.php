<?php

namespace App\Filament\Resources\TripRequests\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class TripRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('no_telepon'),
                TextColumn::make('unit.model')
                    ->label('Unit')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal_berangkat')
                    ->label('Tanggal Berangkat')
                    ->searchable()
                    ->sortable()
                    ->date('d M Y'),
                TextColumn::make('durasi')
                    ->label('Durasi (Hari)')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tujuan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('catatan')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
