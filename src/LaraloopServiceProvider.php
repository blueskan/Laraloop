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
        if (config('laraloop.is_teg_active')) {
            $this->app->singleton('senemoglu.laraloop', function() {
                return new \Sendloop\SendloopAPI3(config('laraloop.apikey'), config('laraloop.subdomain'), config('laraloop.response_type'));
            });
        }

        if (config('laraloop.is_mta_active')) {
            $this->app->singleton('senemoglu.laraloop_mta', function () {
                return new \Sendloop\MTA\Mailer(config('laraloop.apikey'));
            });
        }
    }

    protected function configuration()
    {
        $this->mergeConfigFrom(
            __DIR__. '/laraloop.php', 'laraloop'
        );

        $this->publishes([
            __DIR__. '/laraloop.php' => config_path('laraloop.php'),
        ]);
    }

}