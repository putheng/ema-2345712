@extends('vendors.layout')
@section('content')
@include('vendors.partials.topbar')

    <div class="container mb-5 pb-3">
      <div class="bg-light box-shadow-lg rounded-lg overflow-hidden">
        <div class="row">
          <!-- Sidebar-->
          @include('vendors.partials.aside')
          <!-- Content-->
          

<section class="col-lg-8 pt-lg-4 pb-md-4">
	<div class="pt-2 px-4 pl-lg-0 pr-xl-5">
		<h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-left border-bottom">
	  		Products
		</h2>
		<div class="row pt-2">
		    @foreach($products as $product)
	          <div class="col-sm-4 mb-grid-gutter">
	            <div class="card product-card-alt">
	              <div class="product-thumb">

	                  <a class="product-thumb-overlay" href="{{ route('show.product', $product) }}"></a>
	                    <img style="width: 332px;" src="{{ $product->image->first()->product() }}" alt="Product">

	                </div>
	              <div class="card-body">
	                <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
	                  <div class="text-muted font-size-xs mr-1">
	                    <a class="product-meta font-weight-medium" href="#">
	                      {{ $product->category->name }}
	                    </a>
	                  </div>
	                </div>
	                <h3 class="product-title font-size-sm mb-2">
	                  <a href="{{ route('show.product', $product) }}">{{ $product->name }}</a>
	                </h3>
	                <div class="d-flex flex-wrap justify-content-between align-items-center">
	                  <div class="bg-faded-accent text-accent rounded-sm py-1 px-2">{{ $product->formattedTaxPrice }}</div>
	                </div>
	              </div>
	            </div>
	          </div>
	          <!-- Product-->
	        @endforeach
		</div>
		{{ $products->links() }}
	</div>
	</section>
        </div>
      </div>
    </div>
    <!-- Toast: Added to Cart-->
    <div class="toast-container toast-bottom-center">
      <div class="toast mb-3" id="cart-toast" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white"><i class="czi-check-circle mr-2"></i>
          <h6 class="font-size-sm text-white mb-0 mr-auto">Added to cart!</h6>
          <button class="close text-white ml-2 mb-1" type="button" data-dismiss="toast" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="toast-body">This item has been added to your cart.</div>
      </div>
    </div>
@endsection