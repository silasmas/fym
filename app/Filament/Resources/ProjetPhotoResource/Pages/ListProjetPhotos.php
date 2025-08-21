<?php

namespace App\Filament\Resources\ProjetPhotoResource\Pages;

use App\Filament\Resources\ProjetPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjetPhotos extends ListRecords
{
    protected static string $resource = ProjetPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
