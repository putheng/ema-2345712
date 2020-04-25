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
	  <h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-left border-bottom">Products<span class="badge badge-secondary font-size-sm text-body align-middle ml-2">6</span></h2>
	  <div class="row pt-2">
	    <!-- Product-->
	    <div class="col-sm-6 mb-grid-gutter">
	      <div class="card product-card-alt">
	        <div class="product-thumb">
	          <button class="btn-wishlist btn-sm" type="button"><i class="czi-heart"></i></button>
	          <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="marketplace-single.html"><i class="czi-eye"></i></a>
	            <button class="btn btn-light btn-icon btn-shadow font-size-base mx-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart"></i></button>
	          </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="/dist/img/marketplace/products/04.jpg" alt="Product">
	        </div>
	        <div class="card-body">
	          <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
	            <div class="text-muted font-size-xs mr-1">by <a class="product-meta font-weight-medium" href="#">Createx Std. </a>in <a class="product-meta font-weight-medium" href="#">Graphics</a></div>
	            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i>
	            </div>
	          </div>
	          <h3 class="product-title font-size-sm mb-2"><a href="marketplace-single.html">Flat-line E-Commerce Icons (AI)</a></h3>
	          <div class="d-flex flex-wrap justify-content-between align-items-center">
	            <div class="font-size-sm mr-2"><i class="czi-download text-muted mr-1"></i>26<span class="font-size-xs ml-1">Sales</span></div>
	            <div class="bg-faded-accent text-accent rounded-sm py-1 px-2">$18.<small>00</small></div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- Product-->
	    <div class="col-sm-6 mb-grid-gutter">
	      <div class="card product-card-alt">
	        <div class="product-thumb">
	          <button class="btn-wishlist btn-sm" type="button"><i class="czi-heart"></i></button>
	          <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="marketplace-single.html"><i class="czi-eye"></i></a>
	            <button class="btn btn-light btn-icon btn-shadow font-size-base mx-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart"></i></button>
	          </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="/dist/img/marketplace/products/01.jpg" alt="Product">
	        </div>
	        <div class="card-body">
	          <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
	            <div class="text-muted font-size-xs mr-1">by <a class="product-meta font-weight-medium" href="#">Createx Std. </a>in <a class="product-meta font-weight-medium" href="#">UI Design</a></div>
	            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
	            </div>
	          </div>
	          <h3 class="product-title font-size-sm mb-2"><a href="marketplace-single.html">Square Style Mobile UI Kit (Sketch)</a></h3>
	          <div class="d-flex flex-wrap justify-content-between align-items-center">
	            <div class="font-size-sm mr-2"><i class="czi-download text-muted mr-1"></i>153<span class="font-size-xs ml-1">Sales</span></div>
	            <div class="bg-faded-accent text-accent rounded-sm py-1 px-2">$24.<small>00</small></div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- Product-->
	    <div class="col-sm-6 mb-grid-gutter">
	      <div class="card product-card-alt">
	        <div class="product-thumb">
	          <button class="btn-wishlist btn-sm" type="button"><i class="czi-heart"></i></button>
	          <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="marketplace-single.html"><i class="czi-eye"></i></a>
	            <button class="btn btn-light btn-icon btn-shadow font-size-base mx-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart"></i></button>
	          </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="/dist/img/marketplace/products/05.jpg" alt="Product">
	        </div>
	        <div class="card-body">
	          <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
	            <div class="text-muted font-size-xs mr-1">by <a class="product-meta font-weight-medium" href="#">Createx Std. </a>in <a class="product-meta font-weight-medium" href="#">UI Design</a></div>
	            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
	            </div>
	          </div>
	          <h3 class="product-title font-size-sm mb-2"><a href="marketplace-single.html">Minimal Mobile App UI Kit (Sketch)</a></h3>
	          <div class="d-flex flex-wrap justify-content-between align-items-center">
	            <div class="font-size-sm mr-2"><i class="czi-download text-muted mr-1"></i>117<span class="font-size-xs ml-1">Sales</span></div>
	            <div class="bg-faded-accent text-accent rounded-sm py-1 px-2">$23.<small>00</small></div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- Product-->
	    <div class="col-sm-6 mb-grid-gutter">
	      <div class="card product-card-alt">
	        <div class="product-thumb">
	          <button class="btn-wishlist btn-sm" type="button"><i class="czi-heart"></i></button>
	          <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="marketplace-single.html"><i class="czi-eye"></i></a>
	            <button class="btn btn-light btn-icon btn-shadow font-size-base mx-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart"></i></button>
	          </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="/dist/img/marketplace/products/02.jpg" alt="Product">
	        </div>
	        <div class="card-body">
	          <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
	            <div class="text-muted font-size-xs mr-1">by <a class="product-meta font-weight-medium" href="#">Createx Std. </a>in <a class="product-meta font-weight-medium" href="#">Graphics</a></div>
	            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i>
	            </div>
	          </div>
	          <h3 class="product-title font-size-sm mb-2"><a href="marketplace-single.html">Floating Phone and Tablet Mockup (PSD)</a></h3>
	          <div class="d-flex flex-wrap justify-content-between align-items-center">
	            <div class="font-size-sm mr-2"><i class="czi-download text-muted mr-1"></i>109<span class="font-size-xs ml-1">Sales</span></div>
	            <div class="bg-faded-accent text-accent rounded-sm py-1 px-2">$15.<small>00</small></div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- Product-->
	    <div class="col-sm-6 mb-grid-gutter">
	      <div class="card product-card-alt">
	        <div class="product-thumb">
	          <button class="btn-wishlist btn-sm" type="button"><i class="czi-heart"></i></button>
	          <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="marketplace-single.html"><i class="czi-eye"></i></a>
	            <button class="btn btn-light btn-icon btn-shadow font-size-base mx-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart"></i></button>
	          </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="/dist/img/marketplace/products/06.jpg" alt="Product">
	        </div>
	        <div class="card-body">
	          <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
	            <div class="text-muted font-size-xs mr-1">by <a class="product-meta font-weight-medium" href="#">Createx Std. </a>in <a class="product-meta font-weight-medium" href="#">Graphics</a></div>
	            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i>
	            </div>
	          </div>
	          <h3 class="product-title font-size-sm mb-2"><a href="marketplace-single.html">Travel &amp; Landmark Icon Pack (AI)</a></h3>
	          <div class="d-flex flex-wrap justify-content-between align-items-center">
	            <div class="font-size-sm mr-2"><i class="czi-download text-muted mr-1"></i>21<span class="font-size-xs ml-1">Sales</span></div>
	            <div class="bg-faded-accent text-accent rounded-sm py-1 px-2">$17.<small>00</small></div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- Product-->
	    <div class="col-sm-6 mb-grid-gutter">
	      <div class="card product-card-alt">
	        <div class="product-thumb">
	          <button class="btn-wishlist btn-sm" type="button"><i class="czi-heart"></i></button>
	          <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow font-size-base mx-2" href="marketplace-single.html"><i class="czi-eye"></i></a>
	            <button class="btn btn-light btn-icon btn-shadow font-size-base mx-2" type="button" data-toggle="toast" data-target="#cart-toast"><i class="czi-cart"></i></button>
	          </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="/dist/img/marketplace/products/03.jpg" alt="Product">
	        </div>
	        <div class="card-body">
	          <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
	            <div class="text-muted font-size-xs mr-1">by <a class="product-meta font-weight-medium" href="#">Createx Std. </a>in <a class="product-meta font-weight-medium" href="#">Graphics</a></div>
	            <div class="star-rating"><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star-filled active"></i><i class="sr-star czi-star"></i>
	            </div>
	          </div>
	          <h3 class="product-title font-size-sm mb-2"><a href="marketplace-single.html">Project Devices Showcase (PSD)</a></h3>
	          <div class="d-flex flex-wrap justify-content-between align-items-center">
	            <div class="font-size-sm mr-2"><i class="czi-download text-muted mr-1"></i>95<span class="font-size-xs ml-1">Sales</span></div>
	            <div class="bg-faded-accent text-accent rounded-sm py-1 px-2">$18.<small>00</small></div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
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