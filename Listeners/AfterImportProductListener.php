<?php

namespace Modules\PricePerQty\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\PricePerQty\Repositories\PricePerQuantityRepository;

class AfterImportProductListener
{

    public function handle($event)
    {

        $product = $event->product();
        $price_per_quantities = $this->selectFields($event->data());

        PricePerQuantityRepository::destroyAllByProduct($product);
        foreach ($price_per_quantities as $price_per_quantity) {
            PricePerQuantityRepository::store($price_per_quantity+['product_id' => $product->id]);
        }
    }


    private function selectFields($data)
    {
        $price_per_quantities = collect([]);
        foreach ($data as $field => $value) 
        {
            if(!is_null($value))
            {
                if(preg_match('/\b(price_qty_price_\w*)\b/', $field))
                {
                    $key = str_replace('price_qty_price_', '', $field);
                    if(isset($data['price_qty_qty_'.$key]))
                    {
                        if(!is_null($data['price_qty_qty_'.$key]))
                        {
                            $price_per_quantities->push(['qty' => $data['price_qty_qty_'.$key], 'price' => $value]);
                        }
                    }
                }
            }
        }
        return $price_per_quantities;
    }
}
