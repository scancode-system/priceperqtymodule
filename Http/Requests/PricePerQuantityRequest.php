<?php

namespace Modules\PricePerQty\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricePerQuantityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'qty' => 'required|integer|min:1'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
