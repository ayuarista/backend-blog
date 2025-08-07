<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CategoryResource;

class CreateCategory extends CreateRecord
{
    
    protected static string $resource = CategoryResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return null;
    }

    protected function AfterCreate(): void
    {
        Notification::make()
            ->success()
            ->title('Category created successfully')
            ->body('You can now add posts to this category.')
            ->send();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
