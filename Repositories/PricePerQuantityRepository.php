<?php

namespace Modules\PricePerQty\Repositories;

use Modules\PricePerQty\Entities\PricePerQuantity;
use Modules\Product\Entities\Product;


class PricePerQuantityRepository
{

	// CREATE
	public static function store($data)
	{
		PricePerQuantity::create($data);
	}

	// DESTROY
	public static function destroy(PricePerQuantity $price_per_quantity)
	{
		$price_per_quantity->delete();
	}

	public static function destroyAllByProduct(Product $product)
	{
		$price_per_quantities = $product->price_per_quantities;
		foreach ($price_per_quantities as $price_per_quantity) {
			$price_per_quantity->delete();
		}
	}
 
}
