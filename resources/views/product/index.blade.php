@extends('product.layout')

@section('content')
<section class="px-lg-3 pt-4">
    <div class="px-3 pt-2">
      <!-- Page title + breadcrumb-->
      <!-- Content-->
      <!-- Slider-->
      @include('product.partials.slider')
      <!-- How it works-->
      @include('product.partials.hiw')
      <!-- Discounted products (Carousel)-->
      @include('product.partials.discounted')
      <!-- Bestsellers (Carousel)-->
      @include('product.partials.best')
      <!-- Reviews-->
      @include('product.partials.releases')

      {{-- @include('product.partials.most-release') --}}
      {{-- @include('product.partials.most-but') --}}
      {{-- @include('product.partials.most-cloth') --}}

      <div class="pb-4"></div>
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
    </div>
  </section>
@endsection
