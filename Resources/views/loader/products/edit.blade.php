<hr>
{{ Form::open(['route' => 'priceperquantity.store']) }}
{{ Form::hidden('product_id', $product->id) }}
<div class="row">
	<div class="col-md-5">
		{{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => 'Preço Promocional']) }}
	</div>
	<div class="col-md-5">
		{{ Form::text('qty', null, ['class' => 'form-control', 'placeholder' => 'Quantidade']) }}
	</div>
	<div class="col-md-2">
		{{ Form::button('<i class="fa fa-save float-left"></i><span>Salvar</span>', ['class' => 'w-100 btn btn-brand btn-primary', 'type' => 'submit']) }}
	</div>
</div>
{{ Form::close() }}

<table class="table table-responsive-sm bg-white table-hover border mt-3">
	@include('priceperqty::loader.products.tables.thead')
	<tbody>
		@each('priceperqty::loader.products.tables.tr', $product->price_per_quantities, 'price_per_quantity')
	</tbody>
</table>