<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Resources\Pages\Page;

class Articles extends Page
{
    protected static string $resource = ArticleResource::class;

    protected static string $view = 'filament.resources.article-resource.pages.articles';
}
