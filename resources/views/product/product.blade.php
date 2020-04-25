@extends('product.layout')

@section('content')
<section class="px-lg-3 pt-4">
	<div class="px-3 pt-2">
		<!-- Page title + breadcrumb-->
		<nav class="mb-4" aria-label="breadcrumb">
			<ol class="breadcrumb flex-lg-nowrap">
				<li class="breadcrumb-item"><a class="text-nowrap" href="home-grocery-store.html"><i class="czi-home"></i>Home</a></li>
				<li class="breadcrumb-item text-nowrap active" aria-current="page">Product catalog</li>
			</ol>
		</nav>
		<!-- Content-->
		<!-- Sorting-->
		<section class="d-md-flex justify-content-between align-items-center mb-4 pb-2">
			<h1 class="h2 mb-3 mb-md-0 mr-3">Product catalog</h1>
			<div class="d-flex align-items-center">
				<div class="d-none d-sm-block py-2 font-size-sm text-muted text-nowrap mr-2">Sort by:</div>
				<ul class="nav nav-tabs font-size-sm mb-0">
					<li class="nav-item"><a class="nav-link active" href="#">Popular</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Cheap</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Expensive</a></li>
				</ul>
			</div>
		</section>
		<!-- Product grid-->
		<div class="row no-gutters mx-n2">
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/01.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Fruits and Vegetables</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Coconut, Indonesia (piece)</a></h3>
						<div class="product-price"><span class="text-accent">$2.<small>99</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/02.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Dairy and Eggs</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Soft Creme Cheese (200g)</a></h3>
						<div class="product-price"><span class="text-accent">$3.<small>99</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<span class="badge badge-danger badge-shadow">Sale</span>
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/03.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Soft Drinks and Juice</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Pepsi Soda Can (.33ml)</a></h3>
						<div class="product-price"><span class="text-accent">$1.<small>00</small></span>
							<del class="font-size-sm text-muted">$1.<small>25</small></del>
						</div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/04.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Fruits and Vegetables</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Fresh Orange, Spain (1kg)</a></h3>
						<div class="product-price"><span class="text-accent">$1.<small>75</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/05.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Personal hygiene</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Moisture Body Lotion (250ml)</a></h3>
						<div class="product-price"><span class="text-accent">$5.<small>20</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<span class="badge badge-info badge-shadow">New</span>
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/06.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Snacks, Sweets and Chips</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Nut Chocolate Paste (750g)</a></h3>
						<div class="product-price"><span class="text-accent">$7.<small>50</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/07.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Dairy and Eggs</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Mozzarella Mini Cheese</a></h3>
						<div class="product-price"><span class="text-accent">$4.<small>99</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/08.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Dairy and Eggs</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Mozzarella Cheese (125g)</a></h3>
						<div class="product-price"><span class="text-accent">$4.<small>30</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/09.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Personal hygiene</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Men’s Shampoo (400ml)</a></h3>
						<div class="product-price"><span class="text-accent">$5.<small>99</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/10.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Meat and Poultry</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Frozen Oven-ready Poultry</a></h3>
						<div class="product-price"><span class="text-accent">$12.<small>00</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<span class="badge badge-warning badge-shadow">Popular</span>
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/11.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Snacks, Sweets and Chips</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Dark Chocolate with Nuts</a></h3>
						<div class="product-price"><span class="text-accent">$2.<small>50</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/12.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Corn Oil Bottle (500ml)</a></h3>
						<div class="product-price"><span class="text-accent">$3.<small>10</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/13.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Fish and Seafood</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Steak Salmon Fillet (1kg)</a></h3>
						<div class="product-price"><span class="text-accent">$17.<small>99</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/14.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Canned Food and Oil</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Sardine in Tomato Sauce (105g)</a></h3>
						<div class="product-price"><span class="text-accent">$3.<small>25</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/15.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Packets, Cereals</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Italian Pasta (500g)</a></h3>
						<div class="product-price"><span class="text-accent">$2.<small>99</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
			<!-- Product-->
			<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 px-2 mb-3">
				<div class="card product-card card-static pb-3">
					<button class="btn-wishlist btn-sm" type="button" data-toggle="tooltip" data-placement="left" title="Add to wishlist"><i class="czi-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="grocery-single.html"><img src="dist/img/grocery/catalog/16.jpg" alt="Product"></a>
					<div class="card-body py-2">
						<a class="product-meta d-block font-size-xs pb-1" href="#">Packets, Cereals</a>
						<h3 class="product-title font-size-sm"><a href="grocery-single.html">Rice Cakes with Chia Seeds</a></h3>
						<div class="product-price"><span class="text-accent">$1.<small>40</small></span></div>
					</div>
					<div class="product-floating-btn">
						<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="pt-4 pb-5 mb-4">
			<!-- Pagination-->
			<nav class="d-flex justify-content-between pt-2" aria-label="Page navigation">
				<ul class="pagination">
					<li class="page-item"><a class="page-link" href="#"><i class="czi-arrow-left mr-2"></i>Prev</a></li>
				</ul>
				<ul class="pagination">
					<li class="page-item d-sm-none"><span class="page-link page-link-static">1 / 5</span></li>
					<li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="sr-only">(current)</span></span></li>
					<li class="page-item d-none d-sm-block"><a class="page-link" href="#">2</a></li>
					<li class="page-item d-none d-sm-block"><a class="page-link" href="#">3</a></li>
					<li class="page-item d-none d-sm-block"><a class="page-link" href="#">4</a></li>
					<li class="page-item d-none d-sm-block"><a class="page-link" href="#">5</a></li>
				</ul>
				<ul class="pagination">
					<li class="page-item"><a class="page-link" href="#" aria-label="Next">Next<i class="czi-arrow-right ml-2"></i></a></li>
				</ul>
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