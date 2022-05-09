<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Closure;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\TemporaryUploadedFile;
use function Livewire\str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Business';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
            Grid::make([
                'default' => 1,
                'xl' => 3,
            ])->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('slug')
                                ->maxLength(255)
                                ->unique('products', 'slug', fn($record) => $record)
                                ->required(),
                            CheckBox::make('Copy')
                                ->label('Copy from title')
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
                        ]),
                        Forms\Components\Textarea::make('excerpt')
                            ->maxLength(255)
                            ->required(),
                    ])->columnSpan([
                        'default' => 1,
                        'xl' => 2,
                    ]),
                Forms\Components\Group::make([
                    Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Created at')
                                ->content(fn(?Product $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Last modified at')
                                ->content(fn(?Product $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                        ]),
                    Forms\Components\Card::make()
                        ->schema([
                            FileUpload::make('thumbnail')
                                ->required()
                                ->image()
                                ->imagePreviewHeight('150')
                                ->imageCropAspectRatio('16:9')
                                ->imageResizeTargetWidth('640')
                                ->imageResizeTargetHeight('360')
                                ->disk('s3')
                                ->directory('images')
                                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                                    return (string)str($file->getClientOriginalName())->prepend(uniqid(date('YmdHis')) . '_');
                                })->multiple(),
                        ])
                ])->columns(1)
            ])
        ];
    }

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->limit(20)
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('slug')
                ->limit(20)
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('excerpt')
                ->limit(20)
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
                }),
        ];
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
