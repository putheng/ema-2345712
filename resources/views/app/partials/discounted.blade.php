<div class="row mt-5">
	<div class="col  d-flex justify-content-between">
		<p class="mb-0 pb-0">
			Discounted products
		</p>
		<small><a href="#">View All</a></small>
	</div>
</div>
<div class="row mt-2 p-2">
	@foreach($products as $product)
		<div class="col-6 mb-3">
			<div class="card product-card card-static pb-3 text-center">
				<a class="card-img-top d-block overflow-hidden" href="{{ route('show.product', $product) }}">
					<img style="width: 157px; height: 157px;margin: auto;" src="{{ $product->image->first()->product() }}" alt="Product">
				</a>
				<div class="card-body py-2">
					<a class="product-meta d-block font-size-xs pb-1" href="{{ route('show.product', $product) }}">
						{{ $product->category->name }}
					</a>
					<h3 class="product-title font-size-sm">
						<a href="grocery-single.html">{{ $product->name }}</a>
					</h3>
					<div class="product-price">
						<span class="text-accent">{{ $product->formattedSalePrice }}</span>
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>