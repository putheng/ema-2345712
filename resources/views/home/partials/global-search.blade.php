<div class="input-group-overlay d-none d-lg-block mx-4">
	<form action="{{ route('category.filter') }}" method="get">
		<div class="input-group-prepend-overlay">
			<span class="input-group-text">
				<i class="czi-search"></i>
			</span>
		</div>
		<input name="q" class="form-control prepended-form-control appended-form-control" 
			type="text" placeholder="Search for products">

		<div class="input-group-append-overlay">
			<select class="custom-select" name="category">
				<option value="">All categories</option>
				@foreach($categories as $category)
					<option value="{{ $category->slug }}">{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
	</form>
</div>