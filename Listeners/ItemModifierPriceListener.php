<?php

namespace Modules\PricePerQty\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ItemModifierPriceListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $item = $event->getItem();
        $qty = $item->qty;
        $price_per_quantities = $item->product->price_per_quantities;
        $price_per_quantities = $price_per_quantities->sortBy('qty');

        $price = $item->product->price;
        foreach ($price_per_quantities as $price_per_quantity) 
        {
            if($qty >= $price_per_quantity->qty)
            {

            }
        }

        return '31';
    }
}
