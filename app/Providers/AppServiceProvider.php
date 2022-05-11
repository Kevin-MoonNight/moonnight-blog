<?php

namespace App\Providers;

use App\Filament\Pages\Profile;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Blog',
                'Business',
                'Account',
            ]);

            Filament::registerTheme(mix('css/backend.css'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Livewire::component(Profile::getName(), Profile::class);
    }
}
