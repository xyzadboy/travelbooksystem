<?php

namespace App\Filament\Resources\TripRequests;

use App\Filament\Resources\TripRequests\Pages\CreateTripRequest;
use App\Filament\Resources\TripRequests\Pages\EditTripRequest;
use App\Filament\Resources\TripRequests\Pages\ListTripRequests;
use App\Filament\Resources\TripRequests\Schemas\TripRequestForm;
use App\Filament\Resources\TripRequests\Tables\TripRequestsTable;
use App\Models\TripRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;

class TripRequestResource extends Resource
{
    protected static ?string $model = TripRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
        ->schema([
            TextInput::make('nama')
                ->required()
                ->maxLength(255),
            TextInput::make('no_telepon')
                ->required()
                ->maxLength(255),
            Select::make('unit_id')
                ->label('Unit')
                ->relationship('unit', 'model')
                ->required(),
            DatePicker::make('tanggal_berangkat')
                ->required(),
            TextInput::make('tujuan')
                ->required(),
            TextInput::make('catatan')
            ->default('Tidak ada catatan'),
            TextInput::make('email')
                ->required()
                ->email()
                ->maxLength(255),
            TextInput::make('durasi')
                ->prefix('Hari')
                ->required()
                ->integer()
                ->minValue(1),
            Select::make('status')
                ->options([
                    'request' => 'Request',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])
                ->required(),


        ]);
    }

    public static function table(Table $table): Table
    {
        return TripRequestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTripRequests::route('/'),
            'create' => CreateTripRequest::route('/create'),
            'edit' => EditTripRequest::route('/{record}/edit'),
        ];
    }
}
