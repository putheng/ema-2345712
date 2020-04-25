@extends('layouts.main')

@section('content')
<section class="px-lg-3 pt-4 container">
	<div class="px-3 pt-2 ">
		@include('home.partials.slider')
		<section class="pt-4 mb-5">
			<h2 class="h3 text-center mb-grid-gutter pt-2">How it works?</h2>
			<div class="row no-gutters bg-light rounded-lg">
				<div class="col-xl-4 col-lg-12 col-md-4 border-right">
					<div class="py-3">
						<div class="d-flex align-items-center mx-auto py-3 px-3" style="max-width: 362px;">
							<div class="display-2 font-weight-normal border-color mr-4">01</div>
							<div class="pl-2">
								<img class="d-block my-2" src="/images/products/01.png" width="72" alt="Order online">
								<p class="mb-3 pt-1">You order your favorite products online</p>
							</div>
						</div>
						<hr class="d-md-none d-lg-block d-xl-none">
					</div>
				</div>
				<div class="col-xl-4 col-lg-12 col-md-4 border-right">
					<div class="py-3">
						<div class="d-flex align-items-center mx-auto py-3 px-3" style="max-width: 362px;">
							<div class="display-2 font-weight-normal border-color mr-4">02</div>
							<div class="pl-2">
								<img class="d-block my-2" src="/images/products/02.png" width="72" alt="Grocery collected">
								<p class="mb-3 pt-1">A personal assistant collects the products from your list</p>
							</div>
						</div>
						<hr class="d-md-none d-lg-block d-xl-none">
					</div>
				</div>
				<div class="col-xl-4 col-lg-12 col-md-4">
					<div class="py-3">
						<div class="d-flex align-items-center mx-auto py-3 px-3" style="max-width: 362px;">
							<div class="display-2 font-weight-normal border-color mr-4">03</div>
							<div class="pl-2">
								<img class="d-block my-2" src="/images/products/03.png" width="72" alt="Delivery">
								<p class="mb-3 pt-1">We deliver to the door at a time convenient for you</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Bestsellers (Carousel)-->
		@include('home.partials.best-sale')
		<!-- Discounted products (Carousel)-->
		@include('home.partials.discount')
		<!-- Reviews-->
		
		<div class="pb-4"></div>
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