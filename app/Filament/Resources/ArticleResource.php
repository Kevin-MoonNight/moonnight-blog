<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers\CommentsRelationManager;
use App\Http\Controllers\ImagesController;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Closure;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $navigationIcon = 'heroicon-o-pencil';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getFormSchema(Forms\Components\Card::class));
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::getTableColumns())
            ->filters(self::getFilter())
            ->bulkActions([
                Tables\Actions\BulkAction::make('trash')
                    ->action(fn(Collection $records) => $records->each->delete())
                    ->icon('heroicon-o-trash')
                    ->deselectRecordsAfterCompletion()
                    ->requiresConfirmation(),
            ]);
    }

    public static function getFormSchema(string $layout = Forms\Components\Grid::class): array
    {
        return [
            Forms\Components\Grid::make([
                'default' => 1,
                'md' => 2,
            ])->schema([
                $layout::make()
                    ->schema([
                        TextInput::make('title')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\Group::make([
                            TextInput::make('slug')
                                ->maxLength(255)
                                ->required()
                                ->unique(Article::class, 'slug', fn($record) => $record),
                            CheckBox::make('Copy')
                                ->label('Copy from title')
                                ->default(false)
                                ->reactive()
                                ->afterStateUpdated(function (Closure $get, Closure $set, $state) {
                                    if ($state) {
                                        $slug = Str::slug($get('title'));

                                        if (empty($slug)) {
                                            Filament::notify('danger', "Title is empty or cannot be converted!");
                                        } else {
                                            $set('slug', $slug);
                                        }
                                    }
                                })->inline()
                        ]),
                        Forms\Components\Textarea::make('excerpt')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\MarkdownEditor::make('content')
                            ->required()
                            ->fileAttachmentsDisk('s3')
                            ->fileAttachmentsDirectory('attachments'),
                    ])
                    ->columnSpan([
                        'default' => 1,
                        'md' => 2,
                    ]),
                $layout::make()
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->helperText('Please wait for the file to be uploaded')
                            ->required()
                            ->image()
                            ->imagePreviewHeight('150')
                            ->imageCropAspectRatio('16:9')
                            ->imageResizeTargetWidth('640')
                            ->imageResizeTargetHeight('360')
                            ->disk('s3')
                            ->directory('articles')
                            ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                return ImagesController::generateRandomFileName();
                            })->multiple(),
                        Forms\Components\BelongsToManyMultiSelect::make('tag_id')
                            ->relationship('tags', 'name')
                            ->preload(),
                        Forms\Components\Toggle::make('state')
                            ->required()
                            ->label('Published')
                            ->helperText('Every can see this article'),
                    ])
                    ->columnSpan(1),
                $layout::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn(?Article $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn(?Article $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ])
                    ->columnSpan(1),
            ]),
        ];
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
            SelectFilter::make('state')
                ->options([
                    true => 'Published',
                    false => 'Draft',
                ]),
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
        $user = Auth::user();

        if ($user->isAdmin()) {
            return Article::query();
        }

        return $user->articles()->getQuery();
    }

    public static function canEdit(Model $record): bool
    {
        //Since the eloquent query is set up,so we don't need to check for authorization
        return true;
    }

    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
