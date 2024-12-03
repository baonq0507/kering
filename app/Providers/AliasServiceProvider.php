<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Telegram\Bot\Laravel\Facades\Telegram;
use RealRashid\SweetAlert\Facades\Alert;
use Torann\GeoIP\Facades\GeoIP;
class AliasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Telegram', Telegram::class);
        $loader->alias('Alert', Alert::class);
        $loader->alias('GeoIP', GeoIP::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
