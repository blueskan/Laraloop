## Laraloop - Sendloop Wrapper For Laravel 5 ##
Laraloop is a simple wrapper for Sendloop & Sendloop MTA API services, this package coming with 2 facades.

You can use Sendloop libraries in your controllers or services like Laraloop::methodName() or LaraloopMTA::methodName()

For installation you just follow these simple steps:

First install package:

    php composer require senemoglu/laraloop

Second publish vendor configurations via Artisan CLI:

    php artisan vendor:publish

Then add service provider into your app.php configuration file:

    Senemoglu\Laraloop\LaraloopServiceProvider::class

Finally add facades for easy access to Sendloop Methods (optionally, but strongly recommended):

    'Laraloop' => Senemoglu\Laraloop\Facades\Laraloop::class,
    'LaraloopMTA' => Senemoglu\Laraloop\Facades\LaraloopMTA::class

You can look Sendloop Documentations for details about API.
