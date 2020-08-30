<div class="row mt-5">
	<div class="col  d-flex justify-content-between">
		<p class="mb-0 pb-0">
			BEST SELLERS
		</p>
		<small><a href="#">View All</a></small>
	</div>
</div>
<div class="row mt-2 p-2">
	@foreach($products as $product)
		<div class="col-6 mb-3">
			<div class="card product-card card-static pb-3 text-center">
				<a class="card-img-top d-block overflow-hidden" href="{{ route('app.show', $product) }}">
					<img style="width: 157px; height: 157px;margin: auto;" src="{{ $product->image->first()->product() }}" alt="Product">
				</a>
				<div class="card-body py-2">
					<h3 class="product-title font-size-sm">
						<a href="{{ route('app.show', $product) }}">{{ $product->name }}</a>
					</h3>
					<div class="product-price">
		                <span class="text-accent">{{ $product->formattedTaxPrice }}</span>
		                @if($product->formattedMarketPrice)
		                  <del class="font-size-sm text-muted">{{ $product->formattedMarketPrice }}</del>
		                @endif
		            </div>
				</div>
			</div>
		</div>
	@endforeach
</div>