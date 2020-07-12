@extends('product.app')

@section('content')
<section class="px-lg-3 pt-1">
    <div class="px-2">
        <div class="row">
          <div class="col-md-12">
            <home-carosel/>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col  d-flex justify-content-between">
            <p class="mb-0 pb-0">
              PROMOTIONS
            </p>
            <small><a href="#">View All</a></small>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <a href="#">
              <img src="/app/p1.jpg">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/app/p2.jpg">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/app/p3.jpg">
            </a>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col  d-flex justify-content-between">
            <p class="mb-0 pb-0">
              CATEGORIES
            </p>
            <small><a href="#">View All</a></small>
          </div>
        </div>
        <div class="row mt-1">
          @foreach($categories as $category)
            <div class="col text-center">
              <a href="{{ route('app.category', $category) }}">
                <img src="/app/category/{{ $category->image }}">
              </a>
              <small>{{ explode('&', $category->name)[0] }}</small>
            </div>
          @endforeach
        </div>

        <div class="row mt-4">
          @foreach($categoriesb as $categoryb)
            <div class="col">
              <a href="{{ route('app.category', $categoryb) }}">
                <img src="/app/category/{{ $categoryb->image }}">
              </a>
              <small>{{ explode('&', $categoryb->name)[0] }}</small>
            </div>
          @endforeach
        </div>
        
        @include('app.partials.discounted')

        @include('app.partials.best-sale')

      <br>
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
