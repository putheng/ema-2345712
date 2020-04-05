<div class="input-group-overlay d-none d-lg-block mx-4">
	<form action="{{ route('product.filter') }}" method="get">
		<div class="input-group-prepend-overlay">
			<span class="input-group-text">
				<i class="czi-search"></i>
			</span>
		</div>
		<input name="q" class="form-control prepended-form-control appended-form-control" 
			type="text" placeholder="Search for products">

		<div class="input-group-append-overlay">
			<select class="custom-select">
				<option>All categories</option>
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
	</form>
</div>