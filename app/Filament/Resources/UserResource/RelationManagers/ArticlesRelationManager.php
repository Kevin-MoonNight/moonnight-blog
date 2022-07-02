<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\ArticleResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class ArticlesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'articles';

    protected static ?string $recordTitleAttribute = 'slug';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(ArticleResource::getFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(ArticleResource::getTableColumns())
            ->filters(ArticleResource::getFilter())
            ->prependActions([
                Tables\Actions\LinkAction::make('view')
                    ->url(fn(Model $record): string => route('articles.show', ['article' => $record]))
                    ->icon('heroicon-o-eye'),
            ]);
    }

    protected function canCreate(): bool
    {
        return false;
    }

    protected function canDelete(Model $record): bool
    {
        return false;
    }
}
