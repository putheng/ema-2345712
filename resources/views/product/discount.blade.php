@extends('product.layout')

@section('content')
<br>
<section class="px-lg-3 pt-4 container">
	<div class="px-3 pt-2">
		<!-- Page title + breadcrumb-->
		<nav class="mb-4" aria-label="breadcrumb">
			<ol class="breadcrumb flex-lg-nowrap">
				<li class="breadcrumb-item"><a class="text-nowrap" href="{{ route('index') }}"><i class="czi-home"></i>Home</a></li>
				<li class="breadcrumb-item text-nowrap active" aria-current="page">Discounted products</li>
			</ol>
		</nav>
		<!-- Content-->
		<!-- Sorting-->
		<section class="d-md-flex justify-content-between align-items-center mb-4 pb-2">
			<h1 class="h2 mb-3 mb-md-0 mr-3">Discounted products</h1>
		</section>
		<!-- Product grid-->
		<div class="row no-gutters mx-n2">

			@foreach($products as $product)
				<!-- Product-->
				<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
					<div class="card product-card card-static pb-3">
						
						<a class="card-img-top d-block overflow-hidden" href="{{ route('show.product', $product) }}">
							<img src="{{ $product->image->first()->product() }}" alt="Product">
						</a>
						<div class="card-body py-2">
							<a class="product-meta d-block font-size-xs pb-1" href="{{ route('show.product', $product) }}">
								{{ $product->category->name }}
							</a>
							<h3 class="product-title font-size-sm">
								<a href="{{ route('show.product', $product) }}">{{ $product->name }}</a>
							</h3>
							<div class="product-price">
								<span class="text-accent">{{ $product->formattedTaxPrice }}</span>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			<!-- Product-->
		</div>
		<div class="pt-4 pb-5 mb-4">
			<!-- Pagination-->
			<nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
				{{ $products->links() }}
			</nav>
		</div>
		<!-- Toast: Added to Cart-->
		<div class="toast-container toast-bottom-center">
			<div class="toast mb-3" id="cart-toast" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header bg-success text-white">
					<i class="czi-check-circle mr-2"></i>
					<h6 class="font-size-sm text-white mb-0 mr-auto">Added to cart!</h6>
					<button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="toast-body">This item has been added to your cart.</div>
			</div>
		</div>
	</div>
</section>
@endsection