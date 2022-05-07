<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Models\Article;
use App\Models\Tag;
use Closure;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::getTableColumns())
            ->filters(self::getFilter());
    }

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\Grid::make([
                'default' => 1,
                'xl' => 3
            ])->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->maxLength(255)
                        ->required()
                        ->unique(Tag::class, 'name', fn($record) => $record),
                    Forms\Components\Group::make([
                        TextInput::make('slug')
                            ->maxLength(255)
                            ->required()
                            ->unique(Tag::class, 'slug', fn($record) => $record),
                        CheckBox::make('Copy')
                            ->label('Copy from name')
                            ->default(false)
                            ->reactive()
                            ->afterStateUpdated(function (Closure $get, Closure $set, $state) {
                                if ($state) {
                                    $slug = Str::slug($get('name'));

                                    if (empty($slug)) {
                                        Filament::notify('danger', "Name is empty or cannot be converted!");
                                    } else {
                                        $set('slug', $slug);
                                    }
                                }
                            })->inline()
                    ])->columnSpan([
                        'default' => 1,
                        'xl' => 2,
                    ]),
                ])->columnSpan(2),
                Forms\Components\Card::make([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Created at')
                        ->content(fn(?Tag $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Last modified at')
                        ->content(fn(?Tag $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                ])->columnSpan(1)
            ])
        ];
    }

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('updated_at')
                ->label('Last modified')
                ->date()
                ->searchable()
                ->sortable(),
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

    public static function canEdit(Model $record): bool
    {
        //every one can be edit tags
        return true;
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
