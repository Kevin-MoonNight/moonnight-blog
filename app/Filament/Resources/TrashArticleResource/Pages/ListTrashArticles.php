<?php

namespace App\Filament\Resources\TrashArticleResource\Pages;

use App\Filament\Resources\TrashArticleResource;
use Filament\Resources\Pages\ListRecords;

class ListTrashArticles extends ListRecords
{
    protected static string $resource = TrashArticleResource::class;
}
