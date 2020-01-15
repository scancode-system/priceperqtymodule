<?php

namespace Modules\PricePerQty\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Product\Events\AfterImportEvent;
use Modules\PricePerQty\Listeners\AfterImportProductListener;
use Modules\Product\Events\ProductLazyEagerLoadingEvent;
use Modules\PricePerQty\Listeners\ProductLazyEagerLoadingListener;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider 
{

	public function boot() 
	{

	}

	public function register() 
	{
		Event::listen(AfterImportEvent::class, AfterImportProductListener::class);
		Event::listen(ProductLazyEagerLoadingEvent::class, ProductLazyEagerLoadingListener::class);
	}

}

