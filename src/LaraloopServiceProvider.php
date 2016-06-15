<?php namespace Senemoglu\Laraloop;

use Illuminate\Support\ServiceProvider;
use Senemoglu\Currency\Services\JsonConvertService;

class LaraloopServiceProvider extends ServiceProvider {

    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configuration();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('senemoglu.laraloop', function() {
            return new Sendloop\SendloopAPI3(config('laraloop.apikey'), config('laraloop.subdomain'), config('laraloop.response_type'));
        });
    }

    protected function configuration()
    {
        $this->mergeConfigFrom(
            __DIR__. '/config.php', 'laraloop'
        );

        $this->publishes([
            __DIR__. '/config.php' => config_path('config.php'),
        ]);
    }

}