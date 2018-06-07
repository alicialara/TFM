<?php

namespace App\Providers;


use Illuminate\View\ViewServiceProvider;
use Illuminate\Support\Facades\Config;

class MyViewServiceProvider extends ViewServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Register the view finder implementation.
     *
     * @return void
     */
    public function registerViewFinder()
    {
        $this->app->bind('view.finder', function ($app) {
            $custom_path = base_path('resources/views/layouts/' . Config::get('api.' . $this->app->request->get('domain') . '.layout'));
            $paths = array_merge(
                [$custom_path],
                $app['config']['view.paths']
            );

            return new FileViewFinder($app['files'], $paths);
        });
    }
}