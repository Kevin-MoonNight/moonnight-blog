<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Models\Message;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

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
            Forms\Components\Grid::make([
                'default' => 1,
                'xl' => 3
            ])->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('name')
                        ->maxLength(255)
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->maxLength(255)
                        ->email()
                        ->required(),
                    Forms\Components\Textarea::make('message')
                        ->required(),
                    Forms\Components\TextInput::make('type')
                        ->required(),
                ])->columnSpan(2),
                Forms\Components\Card::make([
                    Forms\Components\Placeholder::make('created_at')
                        ->label('Created at')
                        ->content(fn(?Message $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                    Forms\Components\Placeholder::make('updated_at')
                        ->label('Last modified at')
                        ->content(fn(?Message $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                ])->columnSpan(1)
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
            Tables\Columns\TextColumn::make('email')
                ->limit('15')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('message')
                ->limit(20)
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('type')
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
            'index' => Pages\ListMessages::route('/'),
            'view' => Pages\ViewMessage::route('/{record}'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }
}
