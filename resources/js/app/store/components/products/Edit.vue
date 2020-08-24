<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Update Product</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-10">
				<app-form @success="onSuccess" :action="'products/product/'+ product.slug +'/edit'">
					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> What are you offering? </h3>
								
								<input-binding v-model="product.name" name="name" label="Product name" />

								<text-area-binding v-model="product.description" name="description" label="Product description"/>

								<app-option-binding 
									v-if="product.category" 
									name="category" 
									:selected="product.category" 
									:options="categories" label="Category"/>

								<div class="row">
									<div class="col-md-3">
										<input-binding disabled v-model="product.price" name="price" :label="'Price ('+ user.currency +')'"/>
									</div>
									<div class="col-md-3">
										<input-binding v-model="product.sale_price" name="sale_price" :label="'Sale Price ('+ user.currency +')'"/>
									</div>
									<div class="col-md-3" v-show="isVat">

										<div class="form-group">
											<label class="col-form-label">Sale Price include VAT + 10% ({{ user.currency }})</label>
											<input class="form-control" type="text" disabled="" :value="saleVat(product.sale_price)">
										</div>
									</div>

									<div class="col-md-3">
										<input-binding :value="comp(product.sale_price, product.price)" disabled name="commission" :label="'Company\'s Profit ('+ user.currency +')'"/>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label class="col-form-label">Total sale Price ({{ user.currency }})</label>
										<input class="form-control" 
											type="text" disabled="" :value="saleVat(product.sale_price)">
									</div>

									<div class="col-md-3">
										<div class="form-group">
											<label for="com" class="col-form-label">Profit in percent ({{ getPercentage(product.sale_price, product.price) }}%)</label> 
											<input @keyup="recalculate" name="com" id="com" type="text" class="form-control">
										</div>
									</div>

									<div class="col-md-3">
										<input-binding v-model="product.market_price" name="market_price" :label="'Market Price ('+ user.currency +')'"/>
									</div>
								</div>

								<br>
								<div class="row">
									<template v-for="(img, index) in 4">
										<template v-if="product.images">
											<div class="col-md-3">
												<image-picker :image="product.images[index]" :name="'image'+ (index + 1)"/>
												<div class="text-danger" v-if="errors.image+ (index + 1)">
													{{ errors.image1[0] }}
												</div>
											</div>
										</template>
										<template v-else>
											<div class="col-md-3">
												<image-picker :name="'image'+ (index + 1)"/>
											</div>	
										</template>
									</template>
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
				product: [],
				isVat: false
			}
		},
		methods: {
			async fetchCategory(slug){
				let r = await axios.get(`store/store/vat`)
				this.isVat = r.data.vat

				let ca = await axios.get(`products/categories`)
				let pr = await axios.get(`products/${slug}/variations`)

				this.product = pr.data.data
				this.categories = ca.data.data
			},

			onSuccess(response){
				this.$router.push({name: 'store-products-variation', params: {slug: response.data.data.slug}})
			},
			saleVat(sale_price){
				if(this.isVat){
					return Number(sale_price) + (Number(sale_price) * 0.1)
				}

				return sale_price
			},
			comp(sale_price, price){
				return Number(sale_price) - Number(price)
			},
			income(sale_price, price){
				
				if(sale_price != 0 && sale_price != NaN){
					let p = (Number(sale_price) - Number(price)) / Number(price)

					let t = p * 100

					return t
				}

				return '0'
			},

			getPercentage(sale_price, price){
				
				console.log(sale_price)
				console.log(price)

				if(sale_price != 0 && sale_price != NaN){
					let p = (Number(sale_price) - Number(price)) / Number(price)

					let t = p * 100

					// return t
				}

				// return '0'
			},

			recalculate(e){
				let v = Number(e.target.value.replace('%', ''))
				let s = Number(this.product.sale_price)

				let t = s - (s * v) / 100 

				console.log(t)

				this.product.price = t
				
			},
		},
		computed: {
			...mapGetters({
				errors: 'getValidationErrors',
				user: 'userData'
			})
		},
		mounted(){
			this.fetchCategory(this.$route.params.slug)
		}
	}
</script>

<style scoped>
	.npt{
		padding-top: 0 !important;
	}
</style>
