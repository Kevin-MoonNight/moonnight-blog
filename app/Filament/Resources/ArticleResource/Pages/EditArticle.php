<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use App\Http\Controllers\ImagesController;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = Str::slug($data['slug']);

        $oldPath = reset($data['thumbnail']);

        //determine has new thumbnail or not
        if (count($data['thumbnail']) <= 1) {
            $data['thumbnail'] = $oldPath;
        } else {
            //delete old thumbnail
            ImagesController::destroy($oldPath);

            //get new thumbnail url
            $newPath = end($data['thumbnail']);
            $data['thumbnail'] = ImagesController::getS3Url($newPath);
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
