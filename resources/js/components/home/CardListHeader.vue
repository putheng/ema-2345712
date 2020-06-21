<template>
<div class="navbar-tool dropdown ml-3">
	<a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="/cart/checkout">
		<span class="navbar-tool-label">{{ cartCount }}</span><i class="navbar-tool-icon czi-cart"></i>
	</a>
	<a class="navbar-tool-text" href="/cart/checkout">
		<small>My Cart</small>
		{{ totalPrice }}
	</a>
	<div class="dropdown-menu dropdown-menu-right open" style="width: 20rem;">

		<div class="widget widget-cart px-3 pt-2 pb-3">
			<div style="height: 15rem;">
				
				<div class="widget-cart-item py-2 border-bottom" v-for="product in products">
					<button @click.prevent="destroy(product.id)" class="close text-danger" type="button" aria-label="Remove">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="media align-items-center">
						<a class="d-block mr-2" href="">
							<img width="64" :src="product.product.images[0].url" alt="Product"/>
						</a>
						<div class="media-body">
							<h6 class="widget-product-title">
								<a href="">{{ product.product.name }} - {{ product.name }}</a>
							</h6>
							<div class="widget-product-meta">
								<span class="text-accent mr-2">
									{{ product.sale_price }}
								</span>
								<span class="text-muted">x {{ product.quantity }}</span>
								<span class="text-muted"> = {{ product.total }}</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-between align-items-center pt-3">
				<div class="font-size-sm mr-2 py-2">
					<span class="text-muted">Total:</span>
					<span class="text-accent font-size-base ml-1">
						{{ totalPrice }}
					</span>
				</div>
				<a class="btn btn-primary btn-sm" href="/cart/checkout">
					<i class="czi-card mr-2 font-size-base align-middle"></i>
					Checkout<i class="czi-arrow-right ml-1 mr-n1"></i>
				</a>
			</div>
		</div>


	</div>
</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
	methods: {
		...mapActions({
			getCart: 'getCart',
			destroy: 'destroy',
		}),
	},

	mounted(){
		this.getCart()
	},

	computed:{
		...mapGetters({
	        cartCount: 'cartCount',
	        totalPrice: 'total',
	        products: 'products'
	    })
	}
}
</script>