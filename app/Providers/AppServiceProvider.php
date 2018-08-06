<?php

namespace App\Providers;

use App\Http\Throttle\CountryThrottleFactory;
use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryEloquent;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryEloquent;
use GrahamCampbell\Throttle\Throttle;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('api', function ($value, $status = 200) {
            return Response::json(['success' => true, 'data' => $value], $status);
        });

        Response::macro('apiError', function ($value, $status = 400) {
            return Response::json(['success' => false, 'errors' => $value], $status);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepository::class,
            ProductRepositoryEloquent::class
        );

        $this->app->bind(
            OrderRepository::class,
            OrderRepositoryEloquent::class
        );

        // Country throttle
        $this->app->singleton('throttle', function (Container $app) {
            $factory = $app['throttle.factory'];
            $transformer = new CountryThrottleFactory();
            return new Throttle($factory, $transformer);
        });
    }
}
