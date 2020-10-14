@extends('product.app')

@section('content')
<section class="px-lg-3 pt-4">
	<div class="px-3 pt-2" id="app">
		<!-- Page title + breadcrumb-->
		<nav class="mb-4" aria-label="breadcrumb">
			<ol class="breadcrumb flex-lg-nowrap">
				<li class="breadcrumb-item"><a class="text-nowrap" href="{{ url('/home') }}">
		        	<i class="czi-home"></i>Home</a>
		        </li>
				<li class="breadcrumb-item text-nowrap">
					<a href="{{ route('app.category', $product->category) }}">{{ $product->category->name }}</a>
				</li>
				<li class="breadcrumb-item text-nowrap active" aria-current="page">
					{{ $product->name }}
				</li>
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

			<div class="col-xl-5 px-2 mb-3" id="app">
				<div class="h-100 bg-light rounded-lg py-5 px-4 px-sm-5">
					<a class="product-meta d-block font-size-sm pb-2" href="#">
						{{ $store->name }}
					</a>
					<h1 class="h2">{{ $product->name }}</h1>
					@if(!$product->inStock())
						<span class="badge badge-secondary">Out of stock</span>
					@endif
					
					<div class="h2 font-weight-normal text-accent">{{ $product->formattedTaxPrice }}</div>

					<div>
						<br>
						<h6>Product description</h6>
						<p>{!! $product->description !!}</p>
						<br>
					</div>	

					@if(auth()->check())
						@if($product->inStock())
							<product-variations slug="{!! $product->slug !!}"/>
						@endif
					@else
						<a href="#signin-modal" data-toggle="modal" class="btn btn-link">
							Login
						</a>
						<div>to buy this product</div>
					@endif

					

				</div>
			</div>
		</section>
		<!-- Related products-->
		<section class="pb-5 mb-2 mb-xl-4">
			@include('app.partials.maylike', ['productss' => $products])
		</section>
	</div>
</section>
@endsection