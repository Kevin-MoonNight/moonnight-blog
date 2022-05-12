<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Administrator';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Members';
    protected static ?string $pluralLabel = 'Members';
    protected static ?string $slug = 'members';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(self::getFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(self::getTableColumns())
            ->filters(self::getFilters());
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
                        ->required(),
                    Forms\Components\TextInput::make('username')
                        ->maxLength(255)
                        ->unique(User::class, 'username', fn($record) => $record)
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->maxLength(255)
                        ->unique(User::class, 'email', fn($record) => $record)
                        ->email()
                        ->required(),
                ])->columnSpan([
                    'default' => 1,
                    'xl' => 2
                ]),
                Forms\Components\Group::make([
                    Forms\Components\Card::make([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn(?User $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn(?User $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                    ]),
                    Forms\Components\Card::make([
                        Forms\Components\BelongsToManyMultiSelect::make('roles')
                            ->relationship('roles', 'name')
                            ->preload(),
                        Forms\Components\Toggle::make('verified')
                            ->label('Email verified')
                            ->helperText('The email is verified'),
                        Forms\Components\Hidden::make('email_verified_at'),
                    ])
                ])->columnSpan(1)
            ]),
        ];
    }

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('username'),
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\BooleanColumn::make('email_verified_at')
                ->label('Email verified')
                ->getStateUsing(fn($record): bool => !is_null($record->email_verified_at))
                ->sortable()
                ->trueIcon('heroicon-o-check-circle')
                ->falseIcon('heroicon-o-x-circle'),
            Tables\Columns\TextColumn::make('created_at')
                ->date(),
        ];
    }

    public static function getFilters(): array
    {
        return [
            SelectFilter::make('email_verified_at')
                ->label('Email verified')
                ->options([
                    false => 'Unverified',
                    true => 'Verified',
                ])
                ->query(function (Builder $query, array $data): Builder {

                    if ($data['value'] === null) {
                        return $query;
                    }

                    return $data['value'] ? $query->whereNotNull('email_verified_at') : $query->whereNull('email_verified_at');
                }),
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
            RelationManagers\ArticlesRelationManager::class,
            RelationManagers\CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
