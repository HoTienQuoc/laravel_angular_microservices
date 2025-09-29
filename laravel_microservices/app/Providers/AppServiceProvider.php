<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;
use Carbon\CarbonInterval;


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
        //
        Passport::tokensExpireIn(CarbonInterval::days(1));
        Passport::refreshTokensExpireIn(CarbonInterval::days(1));
        Passport::personalAccessTokensExpireIn(CarbonInterval::months(1));
    }
}
