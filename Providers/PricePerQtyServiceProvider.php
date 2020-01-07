<?php

namespace Modules\PricePerQty\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Order\Events\ItemModifierPriceEvent;
use Modules\PricePerQty\Listeners\ItemModifierPriceListener;
use Illuminate\Support\Facades\Event;

class PricePerQtyServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViews();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        Event::listen(ItemModifierPriceEvent::class, ItemModifierPriceListener::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RelationshipServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }


    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/priceperqty');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/priceperqty';
        }, \Config::get('view.paths')), [$sourcePath]), 'priceperqty');
    }



    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
