@extends('product.app')

@section('content')
<section class="px-lg-3 pt-1">
    <div class="px-2">
        <div class="row">
          <div class="col-md-12">
            <home-carosel/>
          </div>
        </div>

        <div class="row">
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
              <img src="https://emarketasia.com/uploads/products/15ed1d27458e071590809204.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="https://emarketasia.com/uploads/products/15eedb43c759171592636476.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="https://emarketasia.com/uploads/products/15f05961355f631594201619.png">
            </a>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col  d-flex justify-content-between">
            <p class="mb-0 pb-0">
              CATEGORIES
            </p>
            <small><a href="#">View All</a></small>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col">
            <a href="#">
              <img src="/images/categories/beef.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/images/categories/chicken.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/images/categories/clothes.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/images/categories/fried-chicken.png">
            </a>
          </div>

          <div class="col">
            <a href="#">
              <img src="/images/categories/hamburger.png">
            </a>
          </div>
        </div>

        <div class="row mt-4">
          <div class="col">
            <a href="#">
              <img src="/images/categories/pizza.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/images/categories/sausage.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/images/categories/settings.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/images/categories/clothes.png">
            </a>
          </div>

          <div class="col">
            <a href="#">
              <img src="/images/categories/beef.png">
            </a>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div>
              <img src="https://emarketasia.com/uploads/products/15f05961355f631594201619.png">
            </div>
            <div>
              <img src="https://emarketasia.com/uploads/products/15f05961355f631594201619.png">
            </div>
          </div>
        </div>

      <br><br><br>
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
