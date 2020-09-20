<template>
<form>
	<div class="row no-gutters pb-5 mb-xl-3">
		<!-- Delivery details-->
		<div class="col-xl-6 mb-3">
			<h1 class="h2 mb-4">បង់ប្រាក់</h1>
			<h2 class="h5 mb-4">ព័ត៌មានលម្អិតសំរាប់ការដឹកជញ្ជូន</h2>
			<shipping-address 
				:addresses="addresses"
            	v-model="form.address_id"
			/>
			
			<div>
				<h2 class="h5 pb-3">ការបញ្ជាទិញរបស់អ្នក</h2>
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
						<span class="mr-2">តម្លៃទំនិញ:</span>
						<span class="text-right font-weight-medium">{{ subtotal }}</span>
					</li>
					<li class="d-flex justify-content-between align-items-center">
						<span class="mr-2">តម្លៃសេវាដឹកជញ្ជូន:</span>
						<span class="text-right font-weight-medium" v-if="shippingMethods.length">
							{{ shippingMethods[0].price }}
						</span>
						<span class="text-right font-weight-medium" v-else>
							សូមជ្រើសរើសអាសយដ្ឋានដឹកជញ្ជូន
						</span>
					</li>
				</ul>
				<h3 class="font-weight-normal text-center my-4 py-2">
					<small>តម្លៃសរុប :</small> {{ totalPrice }}
				</h3>
				
				<div class="accordion box-shadow-sm mb-4" id="payment-methods">
					
					<div class="card">
						<div class="card-header py-3 px-3">
							<div class="custom-control custom-radio">
								<input v-model="form.payment_method_id" class="custom-control-input" value="1" type="radio" name="payment" id="payment-paypal">
								<label class="custom-control-label font-weight-medium text-dark collapsed" for="payment-paypal" data-toggle="collapse" data-target="#paypal" aria-expanded="false">ទូទាត់ជាមួយធនាគា</label>
							</div>
						</div>
						<div class="collapse" id="paypal" data-parent="#payment-methods" style="">
							<div class="card-body">
								<img src="https://s3-ap-southeast-1.amazonaws.com/b24-upload/bank_logos/acleda_logo.jpg" width="70">

								<img src="https://s3-ap-southeast-1.amazonaws.com/b24-upload/bank_app_logos/lyhour_app_logo.png" width="70">

								<img src="https://s3-ap-southeast-1.amazonaws.com/b24-upload/bank_app_logos/pipay_app_logo.png" width="70">
								<img src="https://s3-ap-southeast-1.amazonaws.com/b24-upload/bank_app_logos/wing_app_logo.png" width="70">
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header py-3 px-3">
							<div class="custom-control custom-radio">
								<input v-model="form.payment_method_id" class="custom-control-input" value="2" type="radio" name="payment" id="payment-cash">
								<label class="custom-control-label font-weight-medium text-dark collapsed" for="payment-cash" data-toggle="collapse" data-target="#cash" aria-expanded="false">បង់ប្រាក់នៅពេលដឹកជញ្ជូន</label>
							</div>
						</div>
						<div class="collapse" id="cash" data-parent="#payment-methods" style="">
							<div class="card-body">
								<p class="font-size-sm mb-0">ខ្ញុំនឹងបង់ជាសាច់ប្រាក់ទៅអ្នកដឹកជញ្ជូន។</p>
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
						ទូទាត់ប្រាក់
					</button>

					<p class="text-center mt-2 text-danger" v-if="validations && validations.address_id">
						សូមជ្រើសរើសអាសយដ្ឋាន ឬ បង្កើត អាសយដ្ឋានដឹកជញ្ជូន នៅខាងលើ
					</p>
				</div>
			</div>
		</div>
		<PaymentModal :url="payment_url" v-show="showModal" />
	</div>
</form>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

import PaymentModal from './partials/PaymentModal'

export default {
	data(){
		return {
        	shippingMethods: [],
        	submitting: false,
        	showModal: false,
        	payment_url: '',
        	addresses: [],
        	form: {
	          address_id: null,
	          payment_method_id: 2,
	        },
		}
	},

	components: {
		PaymentModal
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
			setShipping: 'setShipping'
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

					this.showModal = true

					this.payment_url = r.data.payment_url
					
					window.location = r.data.payment_url
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
        	shipping: 'shipping',
        	validations: 'getValidationErrors'
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