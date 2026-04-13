<?php

namespace App\Filament\Resources\Units\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;

class UnitsTable
{
    
    public static function configure(Table $table): Table
    {
        
        return $table
            
            ->columns([
                TextColumn::make('tipe')->label('Tipe'),
                TextColumn::make('model')->label('Model'),
                TextColumn::make('plat_nomor')->label('Plat Nomor'),
                TextColumn::make('kapasitas')->label('Kapasitas'),
                BadgeColumn::make('fasilitas')
                    ->label('Fasilitas')
                    ->separator(', ')
                    ->color('success'),
                ImageColumn::make('cover')
                    ->label('Gambar Utama')
                    ->size(100)
                    ->disk('public'),
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
