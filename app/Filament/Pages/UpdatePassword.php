<?php

namespace App\Filament\Pages;

use Filament\Facades\Filament;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;

class UpdatePassword extends Page implements HasForms
{
    use InteractsWithForms;

    protected static bool $shouldRegisterNavigation = false;
    protected static string $view = 'filament.pages.update-password';

    public function mount()
    {
        $this->form->fill();

        if (session('status')) {
            Filament::notify('success', session('status'), true);
        }
    }

    protected function getBreadcrumbs(): array
    {
        return [
            url()->route('filament.pages.profile') => 'Profile',
            url()->current() => 'Update Password',
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Notice!')
                ->description('If you use social platform to login,please use the forgot password to reset.')
                ->schema([
                    TextInput::make('current_password')
                        ->label('Current Password')
                        ->extraInputAttributes(['name' => 'current_password'])
                        ->password()
                        ->required(),
                    TextInput::make('password')
                        ->label('New Password')
                        ->extraInputAttributes(['name' => 'password'])
                        ->password()
                        ->required(),
                    TextInput::make('password_confirmation')
                        ->label('Password confirmation')
                        ->extraInputAttributes(['name' => 'password_confirmation'])
                        ->password()
                        ->required(),
                ])

        ];
    }
}
