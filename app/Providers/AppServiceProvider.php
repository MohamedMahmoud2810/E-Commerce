<?php

namespace App\Providers;

use App\Models\setting;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!app()->runningInConsole()){
            $setting = Setting::firstor(function(){
                return Setting::Create([
                    'name' => 'site name',
                    'description' => 'laravel'
                ]);
            });
            view()->share('setting' , $setting);
        }

        Paginator::useBootstrap();

    }
}
