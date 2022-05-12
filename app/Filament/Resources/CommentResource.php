<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-o-chat-alt';
    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getFormSchema(Forms\Components\Card::class));
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::getTableColumns())
            ->filters(self::getFilter());
    }

    public static function getFormSchema(string $layout = Forms\Components\Grid::class): array
    {
        return [
            Forms\Components\Grid::make([
                'default' => 1,
                'xl' => 3,
            ])->schema([
                $layout::make()->schema([
                    Forms\Components\Textarea::make('comment')
                        ->maxLength(255)
                        ->required()
                        ->columnSpan([
                            'default' => 1,
                            'xl' => 2,
                        ]),
                ])->columnSpan([
                    'default' => 1,
                    'xl' => 2,
                ]),
                $layout::make()->schema([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Created at')
                        ->content(fn(?Comment $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Last modified at')
                        ->content(fn(?Comment $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                ])->columnSpan(1),
            ]),

        ];
    }

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('article.title')
                ->label('article')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('comment')
                ->limit(50)
                ->searchable(),
            Tables\Columns\TextColumn::make('replies_count')
                ->label('replies')
                ->counts('replies')
                ->sortable(),
            Tables\Columns\TextColumn::make('user.name')
                ->searchable()
                ->sortable(),
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
                })
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return CommentRepository::getUserCommentQuery(Auth::user());
    }

    public static function canEdit(Model $record): bool
    {
        //Since the eloquent query is set up,so we don't need to check for authorization
        return true;
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\RepliesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
