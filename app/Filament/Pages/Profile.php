<?php

namespace App\Filament\Pages;

use App\Forms\Components\AvatarSelector;
use App\Models\User;
use Auth;
use Filament\Facades\Filament;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Actions\ButtonAction;
use Filament\Pages\Page;
use Illuminate\Contracts\View\View;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Account';

    protected static string $view = 'filament.pages.profile';

    public User $user;

    public function mount()
    {
        $this->user = Auth::user();

        $this->form->fill([
            'name' => $this->user->name,
            'email' => $this->user->email,
        ]);

        if (session('status')) {
            Filament::notify('success', session('status'), true);
        }
    }

    protected function getActions(): array|View|null
    {
        return [
            ButtonAction::make('UpdatePassword')
                ->url(route('filament.pages.update-password')),
        ];
    }

    protected function getBreadcrumbs(): array
    {
        return [
            url()->current() => 'Profile',
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make([
                TextInput::make('name')
                    ->extraInputAttributes(['name' => 'name'])
                    ->required(),
                TextInput::make('email')
                    ->label('Email Address')
                    ->extraInputAttributes(['name' => 'email'])
                    ->email()
                    ->required(),
            ]),
            Card::make([
                AvatarSelector::make('profile_photo_url')
                    ->label('Avatar')
                    ->required(),
            ]),
        ];
    }
}
