<template>
	<div>
		<product-variation 
			v-for="(variation, type) in variations"
	        :type="type"
	        :variation="variation"
	        :key="type"
	        v-model="form.variation"
		/>

		<div v-if="form.variation">
			<h6>Quantity</h6>
			<div class="form-group d-flex flex-col flex-wrap align-items-center">

				<select class="custom-select mr-3 mb-3" style="width: 12rem;" v-model="form.quantity">
					<option :value="x" v-for="x in parseInt(form.variation.stock_count)" :key="x">
                    	{{ x }}
                    </option>
				</select>
			</div>

			<button @click.prevent="add" class="btn btn-primary btn-shadow mr-3 mb-3" type="submit">
				<span v-if="loading" 
			class="spinner-border spinner-border-sm"
			role="status" aria-hidden="true"></span>

				<i class="czi-cart font-size-lg mr-2"></i>
				Add to Cart
			</button>
		</div>
	</div>
</template>

<script>
	import { mapActions } from 'vuex'

	export default {
		props: ['slug'],
		data(){
			return {
				variations: [],
				loading: false,
				form: {
		        	variation: '',
		         	quantity: 1
		        }
			}
		},
		watch: {
	      	'form.variation' () {
	        	this.form.quantity = 1
	    	}
	    },
		methods: {
			...mapActions({
		    	store: 'storeCart',
		    	getCart: 'getCart'
		    }),
			fetchVariation(slug){
				axios.get(`products/${slug}/variations`)
					.then((response) => {
						this.variations = response.data.data.variations
					})
					.catch((error) => {})
			},
			add () {
				this.loading = true

				this.store([{
		        	id: this.form.variation.id, quantity: this.form.quantity
		        }])
				.then((re) => {
		        	this.loading = false
		        	this.form = {
			          variation: '',
			          quantity: 1
			        }
		        })


		        this.getCart()
		    }
		},
		mounted(){
			this.fetchVariation(this.slug)
		}
	}
</script>