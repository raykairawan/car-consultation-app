<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $view->with('username', Auth::user()->name ?? 'Guest');
            $view->with('email', Auth::user()->email ?? 'guest@gmail.com');
            $view->with('created_at', Auth::user()->created_at ?? '24-02-2001');
            $view->with('greeting', $this->getGreeting());
        });
    }

    private function getGreeting(): string
    {
        $hour = now()->format('H');

        if ($hour >= 5 && $hour < 12) {
            return 'Selamat Pagi';
        } elseif ($hour >= 12 && $hour < 15) {
            return 'Selamat Siang';
        } elseif ($hour >= 15 && $hour < 18) {
            return 'Selamat Sore';
        } else {
            return 'Selamat Malam';
        }
    }
}
