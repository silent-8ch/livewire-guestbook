<?php

namespace App\Filament\Resources\GuestbookEntries;

use App\Filament\Resources\GuestbookEntries\Pages\CreateGuestbookEntry;
use App\Filament\Resources\GuestbookEntries\Pages\EditGuestbookEntry;
use App\Filament\Resources\GuestbookEntries\Pages\ListGuestbookEntries;
use App\Filament\Resources\GuestbookEntries\Schemas\GuestbookEntryForm;
use App\Filament\Resources\GuestbookEntries\Tables\GuestbookEntriesTable;
use App\Models\GuestbookEntry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GuestbookEntryResource extends Resource
{
    protected static ?string $model = GuestbookEntry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return GuestbookEntryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GuestbookEntriesTable::configure($table);
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
            'index' => ListGuestbookEntries::route('/'),
            'create' => CreateGuestbookEntry::route('/create'),
            'edit' => EditGuestbookEntry::route('/{record}/edit'),
        ];
    }
}
