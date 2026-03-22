<?php

namespace App\Filament\Resources\GuestbookEntries\Pages;

use App\Filament\Resources\GuestbookEntries\GuestbookEntryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGuestbookEntry extends EditRecord
{
    protected static string $resource = GuestbookEntryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
