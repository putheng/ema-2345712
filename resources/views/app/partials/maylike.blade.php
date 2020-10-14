<h2 class="h3 pb-2 mb-grid-gutter text-center">You may also like</h2>

<div class="row p-2">
	@foreach($productss as $product)
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