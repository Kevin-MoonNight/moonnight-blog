<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use Filament\Resources\Pages\Page;

class Tags extends Page
{
    protected static string $resource = TagResource::class;

    protected static string $view = 'filament.resources.tag-resource.pages.tags';
}
