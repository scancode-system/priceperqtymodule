<?php

namespace Modules\PricePerQty\Repositories;

use Modules\PricePerQty\Entities\PricePerQuantity;


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
 
}
