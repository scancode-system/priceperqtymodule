<?php 

namespace Modules\PricePerQty\Services;

use Modules\Order\Entities\Item;

class PriceModifyService {

	private $block = false;

	public function price(Item $item, $price)
	{
		$qty = $item->qty;
		$price_per_quantities = $item->product->price_per_quantities;
		$price_per_quantities = $price_per_quantities->sortBy('qty');

		foreach ($price_per_quantities as $price_per_quantity) 
		{
			if($qty >= $price_per_quantity->qty)
			{
				$price = $price_per_quantity->price;
			}
		}
		return $price;
	}


	public function block()
	{
		return $this->block;
	}


}