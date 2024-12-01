<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Config;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(Schema::hasTable('configs')){
            $livechat_id = Config::where('key', 'livechat_id')->first();
            view()->share('livechat_id', $livechat_id ? $livechat_id->value : null);

            $telegram_token = Config::where('key', 'telegram_token')->first();

            config(['telegram.bots.mybot.token' => $telegram_token ? $telegram_token->value : null]);

            $imageNotification = Config::where('key', 'anh_thong_bao')->first();
            view()->share('imageNotification', $imageNotification ? $imageNotification->value : null);

            $name_website = Config::where('key', 'name_website')->first();
            if($name_website){
                config(['app.name' => $name_website->value]);
            }

            $title_website = Config::where('key', 'title_website')->first();
            if($title_website){
                config(['app.title' => $title_website->value]);
            }

            $description_website = Config::where('key', 'description_website')->first();
            if($description_website){
                config(['app.description' => $description_website->value]);
            }
        }
    }
}
