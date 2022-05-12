<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrashArticleResource\Pages;
use App\Filament\Resources\TrashArticleResource\RelationManagers;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class TrashArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $navigationIcon = 'heroicon-o-trash';
    protected static ?string $navigationLabel = 'Trashed Articles';
    protected static ?int $navigationSort = 2;
    protected static ?string $pluralLabel = 'Trashed Articles';
    protected static ?string $slug = 'trashed-articles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([[
                //
            ]]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::getTableColumns())
            ->filters(self::getFilter())
            ->actions([
                Tables\Actions\Action::make('restore')
                    ->action(fn(Article $record) => $record->restore())
                    ->icon('heroicon-o-reply')
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('restore')
                    ->action(fn(Collection $records) => $records->each->restore())
                    ->icon('heroicon-o-reply')
                    ->deselectRecordsAfterCompletion()
                    ->requiresConfirmation(),
                Tables\Actions\BulkAction::make('delete')
                    ->action(fn(Collection $records) => $records->each->forceDelete())
                    ->icon('heroicon-o-x')
                    ->color('danger')
                    ->deselectRecordsAfterCompletion()
                    ->requiresConfirmation(),
            ]);
    }

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->limit(50)
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('views')
                ->sortable(),
            Tables\Columns\TextColumn::make('likes_count')
                ->label('likes')
                ->sortable()
                ->counts('likes'),
            Tables\Columns\TextColumn::make('comments_count')
                ->label('comments')
                ->sortable()
                ->counts('comments'),
            Tables\Columns\TextColumn::make('author.name')
                ->searchable()
                ->sortable(),
            BooleanColumn::make('state')->sortable()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle'),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Last modified')
                ->sortable()
                ->date(),
        ];
    }

    public static function getFilter(): array
    {
        return [
            Filter::make('created_at')
                ->form([
                    Forms\Components\DatePicker::make('created_from'),
                    Forms\Components\DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                }),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return ArticleRepository::getUserTrashArticleQuery(Auth::user());
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrashArticles::route('/'),
        ];
    }
}
