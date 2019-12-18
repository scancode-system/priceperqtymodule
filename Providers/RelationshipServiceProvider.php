<?php

namespace Modules\PricePerQty\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

use Modules\Product\Entities\Product;
use Modules\PricePerQty\Entities\PricePerQuantity;


class RelationshipServiceProvider extends ServiceProvider
{


    public function boot()
    {
        Product::addDynamicRelation('price_per_quantities', function (Product $product) {
            return $product->hasMany(PricePerQuantity::class);
        });
    }



    public function register()
    {

    }

}
