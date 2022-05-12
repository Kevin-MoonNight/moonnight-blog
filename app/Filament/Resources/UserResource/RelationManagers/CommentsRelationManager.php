<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\CommentResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Model;

class CommentsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(CommentResource::getFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(CommentResource::getTableColumns())
            ->filters(CommentResource::getFilter());
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
