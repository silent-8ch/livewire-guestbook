<?php

namespace App\Filament\Resources\GuestbookEntries\Pages;

use App\Filament\Resources\GuestbookEntries\GuestbookEntryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGuestbookEntries extends ListRecords
{
    protected static string $resource = GuestbookEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
