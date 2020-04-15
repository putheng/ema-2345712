@extends('layouts.main')

@section('content')
<section class="px-lg-3 pt-4">
	<div class="px-3 pt-2">
		<!-- Page title + breadcrumb-->
		<nav class="mb-4" aria-label="breadcrumb">
			<ol class="breadcrumb flex-lg-nowrap">
				<li class="breadcrumb-item"><a class="text-nowrap" href="home-grocery-store.html"><i class="czi-home"></i>Home</a></li>
				<li class="breadcrumb-item text-nowrap"><a href="#">{{ $product->category->name }}</a>
				</li>
				<li class="breadcrumb-item text-nowrap active" aria-current="page">{{ $product->name }}</li>
			</ol>
		</nav>
		<!-- Content-->
		<!-- Product Gallery + description-->
		<section class="row no-gutters mx-n2 pb-5 mb-xl-3">
			<div class="col-xl-7 px-2 mb-3">
				<div class="h-100 bg-light rounded-lg p-4">
					<div class="cz-product-gallery">
						<div class="cz-preview order-sm-2">
							@foreach($product->image as $key => $image)
								<div class="cz-preview-item {{ $key == 0 ? 'active' : '' }}" id="{{ $image->name }}">
									<img src="{{ asset('uploads/products'. $image->url) }}" alt="Product imagex">
								</div>
							@endforeach
						</div>
						<div class="cz-thumblist order-sm-1">
							@foreach($product->image as $key => $image)
								<a class="cz-thumblist-item {{ $key == 0 ? 'active' : '' }}" href="#{{ $image->name }}">
									<img src="{{ asset('uploads/products'. $image->url) }}" alt="Product thumb">
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-5 px-2 mb-3">
				<div class="h-100 bg-light rounded-lg py-5 px-4 px-sm-5">
					<a class="product-meta d-block font-size-sm pb-2" href="#">{{ $product->category->name }}</a>
					<h1 class="h2">{{ $product->name }}</h1>
					@if(!$product->inStock())
						<span class="badge badge-secondary">Out of stock</span>
					@endif
					<div class="h2 font-weight-normal text-accent">{{ $product->formattedPrice }}</div>

					<div>
						<br>
						<h6>Product description</h6>
						<p>{{ $product->description }}</p>
						<br>
					</div>	

					<product-variations slug="{!! $product->slug !!}"/>

				</div>
			</div>
		</section>
		<!-- Related products-->
		<section class="pb-5 mb-2 mb-xl-4">
			<h2 class="h3 pb-2 mb-grid-gutter text-center">You may also like</h2>
			<div class="cz-carousel cz-controls-static cz-controls-outside cz-dots-enabled">
				<div class="tns-outer" id="tns1-ow">
					<div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button type="button" data-controls="prev" tabindex="-1" aria-controls="tns1"><i class="czi-arrow-left"></i></button><button type="button" data-controls="next" tabindex="-1" aria-controls="tns1"><i class="czi-arrow-right"></i></button></div>
					<div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">11 to 13</span>  of 7</div>
					<div id="tns1-mw" class="tns-ovh tns-ah" style="height: 406px;">
						<div class="tns-inner" id="tns1-iw">
							<div class="cz-carousel-inner  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 16, &quot;controls&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1}, &quot;480&quot;:{&quot;items&quot;:2}, &quot;720&quot;:{&quot;items&quot;:3}, &quot;991&quot;:{&quot;items&quot;:2}, &quot;1140&quot;:{&quot;items&quot;:3}, &quot;1300&quot;:{&quot;items&quot;:4}, &quot;1500&quot;:{&quot;items&quot;:5}}}" id="tns1" style="transform: translate3d(-40%, 0px, 0px);">
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/13.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Fish and Seafood</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Steak Salmon Fillet (1kg)</a></h3>
											<div class="product-price"><span class="text-accent">$17.<small>99</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/14.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Sardine in Tomato Sauce (105g)</a></h3>
											<div class="product-price"><span class="text-accent">$3.<small>25</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/08.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Dairy and Eggs</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Mozzarella Cheese (125g)</a></h3>
											<div class="product-price"><span class="text-accent">$4.<small>30</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/09.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Personal hygiene</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Men’s Shampoo (400ml)</a></h3>
											<div class="product-price"><span class="text-accent">$5.<small>99</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/10.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Meat and Poultry</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Frozen Oven-ready Poultry</a></h3>
											<div class="product-price"><span class="text-accent">$12.<small>00</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/11.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Snacks, Sweets and Chips</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Dark Chocolate with Nuts</a></h3>
											<div class="product-price"><span class="text-accent">$2.<small>50</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/12.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Corn Oil Bottle (500ml)</a></h3>
											<div class="product-price"><span class="text-accent">$3.<small>10</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/13.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Fish and Seafood</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Steak Salmon Fillet (1kg)</a></h3>
											<div class="product-price"><span class="text-accent">$17.<small>99</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/14.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Sardine in Tomato Sauce (105g)</a></h3>
											<div class="product-price"><span class="text-accent">$3.<small>25</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<!-- Product-->
								<div class="tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/08.jpg" alt="Product" class="tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Dairy and Eggs</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Mozzarella Cheese (125g)</a></h3>
											<div class="product-price"><span class="text-accent">$4.<small>30</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<!-- Product-->
								<div class="tns-item tns-slide-active" id="tns1-item1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/09.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Personal hygiene</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Men’s Shampoo (400ml)</a></h3>
											<div class="product-price"><span class="text-accent">$5.<small>99</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<!-- Product-->
								<div class="tns-item tns-slide-active" id="tns1-item2">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/10.jpg" alt="Product" class="tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Meat and Poultry</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Frozen Oven-ready Poultry</a></h3>
											<div class="product-price"><span class="text-accent">$12.<small>00</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<!-- Product-->
								<div class="tns-item tns-slide-active" id="tns1-item3">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/11.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Snacks, Sweets and Chips</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Dark Chocolate with Nuts</a></h3>
											<div class="product-price"><span class="text-accent">$2.<small>50</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<!-- Product-->
								<div class="tns-item" id="tns1-item4" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/12.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Corn Oil Bottle (500ml)</a></h3>
											<div class="product-price"><span class="text-accent">$3.<small>10</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<!-- Product-->
								<div class="tns-item" id="tns1-item5" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/13.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Fish and Seafood</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Steak Salmon Fillet (1kg)</a></h3>
											<div class="product-price"><span class="text-accent">$17.<small>99</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<!-- Product-->
								<div class="tns-item" id="tns1-item6" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/14.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Sardine in Tomato Sauce (105g)</a></h3>
											<div class="product-price"><span class="text-accent">$3.<small>25</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/08.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Dairy and Eggs</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Mozzarella Cheese (125g)</a></h3>
											<div class="product-price"><span class="text-accent">$4.<small>30</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/09.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Personal hygiene</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Men’s Shampoo (400ml)</a></h3>
											<div class="product-price"><span class="text-accent">$5.<small>99</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/10.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Meat and Poultry</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Frozen Oven-ready Poultry</a></h3>
											<div class="product-price"><span class="text-accent">$12.<small>00</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/11.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Snacks, Sweets and Chips</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Dark Chocolate with Nuts</a></h3>
											<div class="product-price"><span class="text-accent">$2.<small>50</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/12.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Corn Oil Bottle (500ml)</a></h3>
											<div class="product-price"><span class="text-accent">$3.<small>10</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/13.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Fish and Seafood</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Steak Salmon Fillet (1kg)</a></h3>
											<div class="product-price"><span class="text-accent">$17.<small>99</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/14.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Sardine in Tomato Sauce (105g)</a></h3>
											<div class="product-price"><span class="text-accent">$3.<small>25</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/08.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Dairy and Eggs</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Mozzarella Cheese (125g)</a></h3>
											<div class="product-price"><span class="text-accent">$4.<small>30</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
								<div class="tns-item" aria-hidden="true" tabindex="-1">
									<div class="card product-card card-static pb-3">
										<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="{{ route('product') }}"><img src="https://demo.createx.studio/cartzilla/img/grocery/catalog/09.jpg" alt="Product" class="loaded tns-complete"></a>
										<div class="card-body py-2">
											<a class="product-meta d-block font-size-xs pb-1" href="#">Personal hygiene</a>
											<h3 class="product-title font-size-sm"><a href="{{ route('product') }}">Men’s Shampoo (400ml)</a></h3>
											<div class="product-price"><span class="text-accent">$5.<small>99</small></span></div>
										</div>
										<div class="product-floating-btn">
											<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</section>
@endsection