<?php

namespace App\Filament\Resources\ProjetPhotoResource\Pages;

use App\Filament\Resources\ProjetPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjetPhoto extends EditRecord
{
    protected static string $resource = ProjetPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
