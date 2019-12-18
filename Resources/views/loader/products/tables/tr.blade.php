<tr>
	<td class="align-middle">@currency($price_per_quantity->price)</td>
	<td class="align-middle">{{ $price_per_quantity->qty }}</td>
	<td class="text-right align-middle">
		{{ Form::button('<i class="fa fa-trash-o"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#price_per_quantity_destroy_'.$price_per_quantity->id]) }}
	</td>
</tr>
@modal_destroy(['route_destroy' => 'priceperquantity.destroy', 'model' => $price_per_quantity, 'modal_id' => 'price_per_quantity_destroy_'.$price_per_quantity->id])