<?php

namespace App\Filament\Resources\CommentResource\RelationManagers;

use App\Filament\Resources\CommentResource;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Model;

class RepliesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'replies';

    protected static ?string $recordTitleAttribute = 'comment';

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

    protected function canEdit(Model $record): bool
    {
        return false;
    }

    protected function canDelete(Model $record): bool
    {
        return false;
    }

    protected function canDeleteAny(): bool
    {
        return false;
    }
}
