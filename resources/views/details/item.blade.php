<div class="row">
	<div class="col-md-2">
		<img style="max-width: 100px;" src="http://www.cruzeskateboards.mx/images/not.jpg">
	</div>
	<div class="col-md-6">
	    <h3> {{ $product["titulo"] }} </h3>
	    <p> {{ $product["descripcion"] }}</p>
	    
	    <p><h3>{{ $price }}</h3><p>
	</div>
	<div class="col-md-2">
		<form method="post" action=" {{ route('detail.update',['id'=>$id]) }}">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<input type="text" name="quantity" value="{{ $quantity }}" >
			<button>Change</button>
		</form>
		<a href="{{ route('detail.destroy',['id'=>$id]) }}">Remove</a>
	</div>
</div>