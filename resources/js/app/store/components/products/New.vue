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

								<app-select name="category" :options="categories" label="Category"/>

								<div class="row">
									<div class="col-md-3">
										<app-input v-model="price" name="o_price" label="Price ($)"/>
									</div>
									<div class="col-md-3">
										<input-binding v-model="vat" disabled name="price" label="ផល់ចំណេញដែលក្រុមហ៊ុនទទួលបាន"/>
									</div>
									<div class="col-md-3">
										<app-input v-model="sale_price" name="o_sale_price" label="Sale Price ($)"/>
									</div>
									<div class="col-md-3">
										<input-binding v-model="saleVat" disabled name="sale_price" label="Sale Price include VAT 10% ($)"/>
									</div>

									
								</div>

								<div class="row">
									<div class="col-md-3">
										<input-binding v-model="comission" name="commission" value="0" label="Commission"/>
									</div>
									<div class="form-group">
										<label for="com" class="col-form-label">ផលចំណេញគិតជាភាគរយ</label> 
										<input :value="income" disabled name="com" id="com" type="text" class="form-control">
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
				comission: 0
			}
		},
		methods: {
			async fetchCategory(){
				let response = await axios.get(`products/categories`)

				this.categories = response.data.data
			},

			onSuccess(response){
				this.$router.push({name: 'store-products-variation', params: {slug: response.data.data.slug}})
			}
		},
		computed: {
			...mapGetters({
				errors: 'getValidationErrors'
			}),
			vat(){
				return parseInt(this.price) + (parseInt(this.price) * 0.1)
			},
			saleVat(){
				return parseInt(this.sale_price) + (parseInt(this.sale_price) * 0.1)	
			},
			income(){

				let p = (this.comission / this.sale_price)

				let t = p * 100

				return t + '%'
			}
		},
		mounted(){
			this.fetchCategory()

			console.log(this.income)
		}
	}
</script>

<style scoped>
	.npt{
		padding-top: 0 !important;
	}
</style>
