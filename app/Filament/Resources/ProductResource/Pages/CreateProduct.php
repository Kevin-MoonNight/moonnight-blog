<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Http\Controllers\ImagesController;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['slug']);

        $data['thumbnail'] = ImagesController::getS3Url(end($data['thumbnail']));

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
