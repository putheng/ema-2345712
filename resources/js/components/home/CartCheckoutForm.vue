<template>
<form>
	<div class="row no-gutters pb-5 mb-xl-3">
		<!-- Delivery details-->
		<div class="col-xl-6 mb-3">
			<h1 class="h2 mb-4">Checkout</h1>
			<h2 class="h5 mb-4">Delivery details</h2>
			<shipping-address />
			<div>
				<h2 class="h5 pb-3">Your order</h2>
				<div class="media align-items-center py-2 border-bottom" 
					v-for="(product, index) in products">
					<a class="d-block mr-2" href="grocery-single.html">
					<img width="64" :src="product.product.images[0].url" alt="Product"/>
					</a>
					<div class="media-body">
						<h6 class="widget-product-title">
							<a href="grocery-single.html">{{ product.product.name }} - {{ product.name }}</a>
						</h6>
						<div class="widget-product-meta">
							<span class="text-accent mr-2">{{ product.sale_price }}</span>
							<span class="text-muted">x {{ product.quantity }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Order summary + payment-->
		<div class="col-xl-5 offset-xl-1 mb-3">
			<div class="bg-light rounded-lg py-5 px-4 px-sm-5">
				<ul class="list-unstyled font-size-sm pb-2 border-bottom">
					<li class="d-flex justify-content-between align-items-center">
						<span class="mr-2">Subtotal:</span>
						<span class="text-right font-weight-medium">{{ subtotal }}</span>
					</li>
					<li class="d-flex justify-content-between align-items-center">
						<span class="mr-2">Delivery:</span>
						<span class="text-right font-weight-medium">$7.<small>00</small></span>
					</li>
				</ul>
				<h3 class="font-weight-normal text-center my-4 py-2">{{ totalPrice }}</h3>
				<div class="accordion box-shadow-sm mb-4" id="payment-methods">
					<div class="card">
						<div class="card-header py-3 px-3">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="license" id="payment-card" checked>
								<label class="custom-control-label font-weight-medium text-dark" for="payment-card" data-toggle="collapse" data-target="#credit-card">Credit card<i class="czi-card text-muted font-size-lg align-middle mt-n1 ml-2"></i></label>
							</div>
						</div>
						<div class="collapse show" id="credit-card" data-parent="#payment-methods">
							<div class="card-body pb-2">
								<input class="form-control mb-3" type="text" placeholder="Card number">
								<div class="row">
									<div class="col-6 mb-3">
										<input class="form-control" type="text" placeholder="MM/YY">
									</div>
									<div class="col-6 mb-3">
										<input class="form-control" type="text" placeholder="CVC">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header py-3 px-3">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="license" id="payment-cash">
								<label class="custom-control-label font-weight-medium text-dark" for="payment-cash" data-toggle="collapse" data-target="#cash">Cash on delivery<i class="czi-wallet text-muted font-size-lg align-middle mt-n1 ml-2"></i></label>
							</div>
						</div>
						<div class="collapse" id="cash" data-parent="#payment-methods">
							<div class="card-body">
								<p class="font-size-sm mb-0">I will pay with cash to the courier on delivery.</p>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h2 class="h6 pb-2">Do you have a coupon code?</h2>
							<div class="d-flex">
								<input class="form-control mr-3" type="text" placeholder="Coupon code">
								<button class="btn btn-outline-primary" type="button">Apply code</button>
							</div>
						</div>
					</div>
				</div>
				<div class="pt-2">
					<button class="btn btn-primary btn-block" type="submit">Place Order</button>
				</div>
			</div>
		</div>
	</div>
</form>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
	methods: {
		...mapActions({
			getCart: 'getCart'
		})
	},

	mounted(){
		this.getCart()
	},

	computed:{
		...mapGetters({
	        cartCount: 'cartCount',
	        totalPrice: 'total',
	        subtotal: 'subtotal',
	        products: 'products'
	    })
	}
}
</script>