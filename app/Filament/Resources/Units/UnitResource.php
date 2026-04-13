<?php

namespace App\Filament\Resources\Units;

use App\Filament\Resources\Units\Pages\CreateUnit;
use App\Filament\Resources\Units\Pages\EditUnit;
use App\Filament\Resources\Units\Pages\ListUnits;
use App\Filament\Resources\Units\Schemas\UnitForm;
use App\Filament\Resources\Units\Tables\UnitsTable;
use App\Models\Unit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;
    

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema
        ->schema([
            Select::make('tipe')
                ->required()
                ->options([
                    'Big Bus' => 'Big Bus',
                    'Medium Bus' => 'Medium Bus',
                    'Mini Bus' => 'Mini Bus',
                    'Micro Bus' => 'Micro Bus',
                ]),
            TextInput::make('model')
                ->required()
                ->maxLength(255),
            TextInput::make('plat_nomor')
                ->required()
                ->maxLength(255),
            TextInput::make('kapasitas')
                ->required()
                ->numeric(),
            Select::make('fasilitas')
                ->multiple()
                ->options([
                    'Full Ac' => 'Full Ac',
                    'LED 32 Inch' => 'LED 32 Inch',
                    'Karaoke System' => 'Karaoke System',
                    'Toilet' => 'Toilet',
                ])
                ->required(),
            FileUpload::make('gambar')
                ->multiple()
                ->reorderable()
                ->preserveFilenames()
                ->image()
                ->directory('units')
                ->disk('public')
                ->visibility('public'),
            FileUpload::make('cover')
                ->preserveFilenames()
                ->image()
                ->directory('units')
                ->disk('public')
                ->visibility('public')
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return UnitsTable::configure($table);
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
            'index' => ListUnits::route('/'),
            'create' => CreateUnit::route('/create'),
            'edit' => EditUnit::route('/{record}/edit'),
        ];
    }
}
