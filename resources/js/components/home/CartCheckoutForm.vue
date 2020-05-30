<template>
<form>
	<div class="row no-gutters pb-5 mb-xl-3">
		<!-- Delivery details-->
		<div class="col-xl-6 mb-3">
			<h1 class="h2 mb-4">Checkout</h1>
			<h2 class="h5 mb-4">Delivery details</h2>
			<shipping-address 
				:addresses="addresses"
            	v-model="form.address_id"
			/>
			
			<div>
				<h2 class="h5 pb-3">Your order</h2>
				<cart-overview-product 
					v-for="(product, index) in products"
					:key="index"
					:product="product"
				/>

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
						<span class="text-right font-weight-medium" v-if="shippingMethods.length">
							{{ shippingMethods[0].price }}
						</span>
						<span class="text-right font-weight-medium" v-else>
							Please select a shipping address
						</span>
					</li>
				</ul>
				<h3 class="font-weight-normal text-center my-4 py-2">
					<small>Total :</small> {{ totalPrice }}
				</h3>
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
				</div>
				<div class="pt-2">
					<button 
						class="btn btn-primary btn-block"
						type="submit"
						:disabled="empty || submitting"
                		@click.prevent="order"
					>
						<span v-if="submitting" 
						class="spinner-border spinner-border-sm mr-2"
						role="status" aria-hidden="true"></span>
						Place Order
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
	data(){
		return {
        	shippingMethods: [],
        	submitting: false,
        	addresses: [],
        	form: {
	          address_id: null,
	          payment_method_id: 1,
	        }
		}
	},

	watch: {
		'form.address_id' (addressId) {
			console.log(addressId)

			this.getShippingMethodsForAddress(addressId).then(() => {
			  this.setShipping(this.shippingMethods[0])
			})
		},

		shippingMethodId () {
			this.getCart()
		}
    },

	methods: {
		...mapActions({
			getCart: 'getCart',
			setShipping: 'setShipping',
		}),
		async fetchData(){

			let addresses = await axios.get('addresses')

			this.addresses = addresses.data.data
		},
		async getShippingMethodsForAddress (addressId) {
	        let response = await axios.get(`addresses/${addressId}/shipping`)

	        this.shippingMethods = response.data.data

	        return response
	    },
	    async order () {
	        this.submitting = true

	        try {
				await axios.post('orders', {
					...this.form,
					shipping_method_id: this.shippingMethodId
				})
				.then((r) => {
					this.getCart()
					this.submitting = false

					// window.location = r.data.data.dashboard + '/cart/order'
				})

	        } catch (e) {

	          this.getCart()
	          this.submitting = false
	        }

	        
	      },
	},

	mounted(){
		this.getCart()
		this.fetchData()
	},

	computed:{
		...mapGetters({
	        cartCount: 'cartCount',
	        totalPrice: 'total',
	        subtotal: 'subtotal',
	        products: 'products',
	        empty: 'empty',
        	shipping: 'shipping'
	    }),
	    shippingMethodId: {
	        get () {
	        	return this.shipping ? this.shipping.id : ''
	        },
	        set (shippingMethodId) {
		        this.setShipping(
		            this.shippingMethods.find(s => s.id === shippingMethodId)
		        )
	        }
	    }
	}
}
</script>