<?php

namespace Modules\PricePerQty\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PricePerQty\Http\Requests\PricePerQuantityRequest;
use Modules\PricePerQty\Repositories\PricePerQuantityRepository;
use Modules\PricePerQty\Entities\PricePerQuantity;


class PricePerQuantityController extends Controller
{

    public function store(PricePerQuantityRequest $request)
    {
        PricePerQuantityRepository::store($request->all());
        return back()->with('success', 'Preco promocional criado.');
    }


    public function destroy(Request $request, PricePerQuantity $price_per_quantity)
    {
        PricePerQuantityRepository::destroy($price_per_quantity);
        return back()->with('success', 'Preco promocional removido.');
    }
}
