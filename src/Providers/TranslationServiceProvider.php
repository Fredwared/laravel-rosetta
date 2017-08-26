<?php

namespace Fredwared\Translatable\Providers;

use Illuminate\Support\ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . DIRECTORY_SEPARATOR . '../routes.php';

        $this->loadViewsFrom( __DIR__. DIRECTORY_SEPARATOR .'../Views', 'fredwared' );
//        $this->loadMigrationsFrom( __DIR__ . DIRECTORY_SEPARATOR . '../Migrations');


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        foreach (glob( __DIR__ .'../Supports/Helpers.php') as $filename){
            require_once($filename);
        }
        $this->app['fredwared'] = $this->app->share(function(){
            return new Fredwared;
        });


    }
}
