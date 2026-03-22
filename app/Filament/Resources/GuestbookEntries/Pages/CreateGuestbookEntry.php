<?php

namespace App\Filament\Resources\GuestbookEntries\Pages;

use App\Filament\Resources\GuestbookEntries\GuestbookEntryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGuestbookEntry extends CreateRecord
{
    protected static string $resource = GuestbookEntryResource::class;
}
