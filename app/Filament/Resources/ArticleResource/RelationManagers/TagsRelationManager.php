<?php

namespace App\Filament\Resources\ArticleResource\RelationManagers;

use App\Filament\Resources\TagResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Model;

class TagsRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'tags';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(TagResource::getFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(TagResource::getTableColumns())
            ->filters(TagResource::getFilter());
    }

    protected function canAttach(): bool
    {
        return false;
    }

    protected function canCreate(): bool
    {
        return false;
    }

    protected function canDelete(Model $record): bool
    {
        return false;
    }

    protected function canEdit(Model $record): bool
    {
        return false;
    }

    protected function canDeleteAny(): bool
    {
        return false;
    }

}
