<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Solarium\Client;

class SolariumServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register any application services.
     *
     * @return  void
     */
    public function register()
    {

        $this->app->bind(Client::class, function ($app) {
            $config = array(
                'endpoint' => array(
                    'localhost' => array(
                        'host' => env('SOLR_HOST', '127.0.0.1'),
                        'port' => env('SOLR_PORT', '8984'),
//            'port' => env('SOLR_PORT', '81'),
                        'path' => env('SOLR_PATH', '/solr/'),
                        'core' => env('SOLR_CORE', 'musacces')
                    )
                )
            );
            return new Client($config);
        });
    }

    public function provides()
    {
        return [Client::class];
    }
}