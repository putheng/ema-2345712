<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Add New Product</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-10">
				<app-form @success="onSuccess" action="products/product">
					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> What are you offering? </h3>
							
								<app-input name="name" label="Product name" />

								<app-text-area name="description" label="Product description"/>

								<app-option-group name="category" :options="categories" label="Category"/>

								<div class="row">
									<div class="col-md-3">
										<input-binding disabled v-model="price" name="price" :label="'Price ('+ user.currency +')'"/>
									</div>
									<div class="col-md-3">
										<app-input v-model="sale_price" name="sale_price" :label="'Sale Price ('+ user.currency +')'"/>
									</div>
									<div class="col-md-3" v-show="isVat">
										<input-binding v-model="saleVat" disabled name="o_sale_price" :label="'Sale Price include VAT + 10% ('+ user.currency +')'"/>
									</div>

									<div class="col-md-3">
										<input-binding v-model="comp" disabled name="commission" :label="'Company\'s Profit ('+ user.currency +')'"/>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<input-binding disabled v-model="saleVat" name="vat_price" value="0" :label="'Total sale Price ('+ user.currency +')'"/>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="com" class="col-form-label">Profit in percent ({{percent}}%)</label> 
											<input v-model="percent"  name="com" id="com" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<app-input name="market_price" :label="'Market Price ('+ user.currency +')'"/>
									</div>
								</div>

								<br>
								<div class="row">
									<div class="col-md-3">
										<image-picker name="image1"/>
										<div class="text-danger" v-if="errors.image1">
											{{ errors.image1[0] }}
										</div>
									</div>
									<div class="col-md-3">
										<image-picker name="image2"/>
									</div>
									<div class="col-md-3">
										<image-picker name="image3"/>
									</div>
									<div class="col-md-3">
										<image-picker name="image4"/>
									</div>
								</div>
						</div>
						<div class="card-body text-right npt">
							<app-button type="submit">Save and Continue</app-button>
						</div>
					</div>
				</app-form>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		data(){
			return {
				categories: [],
				price: 0,
				sale_price: 0,
				comission: 0,
				isVat: false,
				percent: 0
			}
		},
		watch: {
			'sale_price'(s){
				let v = Number(this.percent)
				let p = Number(this.price)

				this.price = s - (s * v) / 100 
			},

			'percent'(e){
				let v = Number(e.replace('%', ''))
				let s = Number(this.sale_price)

				let t = s - (s * v) / 100 

				this.price = t
			}
		},
		methods: {
			async fetchCategory(){
				let r = await axios.get(`store/store/vat`)
				this.isVat = r.data.vat

				let response = await axios.get(`products/categories`)

				this.categories = response.data.data
			},

			onSuccess(response){
				this.$router.push({name: 'store-products-variation', params: {slug: response.data.data.slug}})
			},

			recalculate(e){
				let v = Number(e.target.value.replace('%', ''))
				let s = Number(this.sale_price)

				let t = s - (s * v) / 100 

				this.price = t
				
			}
		},
		computed: {
			...mapGetters({
				errors: 'getValidationErrors',
				user: 'userData'
			}),
			comp(){
				return Number(this.sale_price) - Number(this.price)
			},
			vat(){
				if(this.isVat){
					return Number(this.sale_price) + (Number(this.sale_price) * 0.1)
				}

				return this.sale_price
			},
			saleVat(){
				if(this.isVat){
					return Number(this.sale_price) + (Number(this.sale_price) * 0.1)
				}

				return this.sale_price
			},
			income(){

				// if(this.sale_price != 0){
				// 	let p = (Number(this.sale_price) - Number(this.price)) / Number(this.price)

				// 	let t = p * 100

				// 	return t
				// }
				// return '0'
			}
		},
		mounted(){
			this.fetchCategory()
		}
	}
</script>

<style scoped>
	.npt{
		padding-top: 0 !important;
	}
</style>
