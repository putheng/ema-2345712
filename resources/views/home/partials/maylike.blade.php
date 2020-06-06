<section class="pt-4 container">
	<!-- Heading-->
	<div class="cz-carousel cz-controls-static cz-controls-outside cz-dots-enabled pt-2">
		<div class="cz-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 16, &quot;controls&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1}, &quot;480&quot;:{&quot;items&quot;:2}, &quot;720&quot;:{&quot;items&quot;:3}, &quot;991&quot;:{&quot;items&quot;:2}, &quot;1140&quot;:{&quot;items&quot;:3}, &quot;1300&quot;:{&quot;items&quot;:4}, &quot;1500&quot;:{&quot;items&quot;:5}}}">
			<!-- Product-->
			@foreach($products as $product)
				<div>
					<div class="card product-card card-static pb-3">
						{{-- <span class="badge badge-danger badge-shadow">Sale</span>
						<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist">
							<i class="czi-heart"></i>
						</button> --}}
						<a class="card-img-top d-block overflow-hidden" href="{{ route('show.product', $product) }}">
							<img style="width: 220px; height: 224px" src="{{ $product->image->first()->product() }}" alt="Product">
						</a>
						<div class="card-body py-2">
							<a class="product-meta d-block font-size-xs pb-1" href="{{ route('category.show', $product->category) }}">{{ $product->category->name }}</a>
							<h3 class="product-title font-size-sm">
								<a href="{{ route('show.product', $product) }}">{{ $product->name }}</a>
							</h3>

							<div class="product-price">
								<span class="text-accent">{{ $product->formattedTaxPrice }}</span>
								{{-- <del class="font-size-sm text-muted">{{ $product->formattedTaxPrice }}</del> --}}
							</div>
						</div>
						{{-- <div class="product-floating-btn">
							<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
						</div> --}}
					</div>
				</div>
			@endforeach

			</div>
		</div>
	</div>
</section>