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
              <img src="/app/p1.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/app/p2.png">
            </a>
          </div>
          <div class="col">
            <a href="#">
              <img src="/app/p3.png">
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

        <div class="row mt-4">
          <div class="col  d-flex justify-content-between">
            <p class="mb-0 pb-0">
              Must Sell
            </p>
            <small><a href="#">View All</a></small>
          </div>
        </div>
        <div class="row mt-2 p-2">
          <div class="col">
            <div class="card product-card card-static pb-3 text-center"><a href="https://emarketasia.com/product/divine-noni-1590809204.html/show" class="card-img-top d-block overflow-hidden"><img src="https://emarketasia.com/uploads/products/15ed1d27458e071590809204.png" alt="Product" style="width: 157px; height: 157px;margin: auto;" class="loaded tns-complete"></a> <div class="card-body py-2 text-left"><h3 class="product-title font-size-sm"><a href="https://emarketasia.com/product/divine-noni-1590809204.html/show">ទឹកញ Divine Noni</a></h3> <div class="product-price"><span class="text-accent">$&nbsp;40.00</span> <del class="font-size-sm text-muted">$&nbsp;45.00</del></div></div></div>
          </div>

          <div class="col">
            <div class="card product-card card-static pb-3 text-center"><a href="https://emarketasia.com/product/-1592992913.html/show" class="card-img-top d-block overflow-hidden"><img src="https://emarketasia.com/uploads/products/15ef324911ed9c1592992913.png" alt="Product" style="width: 157px; height: 157px; margin: auto;" class="loaded tns-complete"></a> <div class="card-body py-2 text-left"> <h3 class="product-title font-size-sm"><a href="https://emarketasia.com/product/-1592992913.html/show">សណ្តែកបារាំង</a></h3> <div class="product-price"><span class="text-accent">$&nbsp;4.12</span> <del class="font-size-sm text-muted">$&nbsp;4.50</del></div></div></div>
          </div>
        </div>

        <div class="row mt-2 p-2">
          <div class="col">
            <div class="card product-card card-static pb-3 text-center"><a href="https://emarketasia.com/product/-1589869654/show" class="card-img-top d-block overflow-hidden"><img src="https://emarketasia.com/uploads/products/15ec37c56cd2dd1589869654.png" alt="Product" style="width: 157px; height: 157px; margin: auto;" class="loaded tns-complete"></a> <div class="card-body py-2 text-left"><h3 class="product-title font-size-sm"><a href="https://emarketasia.com/product/-1589869654/show">ឪសថធម្មជាតិចិទឹកយ៉ុង ហ៊ឹង</a></h3> <div class="product-price"><span class="text-accent">$&nbsp;28.60</span> <del class="font-size-sm text-muted">$&nbsp;35.00</del></div></div></div>
          </div>

          <div class="col">
            <div class="card product-card card-static pb-3 text-center"><a href="https://emarketasia.com/product/divine-noni-1590809204.html/show" class="card-img-top d-block overflow-hidden"><img src="https://emarketasia.com/uploads/products/15ed1d27458e071590809204.png" alt="Product" style="margin: auto;" class="loaded tns-complete"></a> <div class="card-body py-2 text-left"><h3 class="product-title font-size-sm"><a href="https://emarketasia.com/product/divine-noni-1590809204.html/show">ទឹកញ Divine Noni</a></h3> <div class="product-price"><span class="text-accent">$&nbsp;40.00</span> <del class="font-size-sm text-muted">$&nbsp;45.00</del></div></div></div>
          </div>
        </div>

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
