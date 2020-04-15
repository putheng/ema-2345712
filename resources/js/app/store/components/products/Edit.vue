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
								{{ product }}
								<input-binding v-model="product.name" name="name" label="Product name" />

								<text-area-binding v-model="product.description" name="description" label="Product description"/>

								<select-binding :selected="product.category" v-model="product.category" name="category" :options="categories" label="Category"/>

								<div class="row">
									<div class="col-md-6">
										<input-binding v-model="product.price" name="price" label="Price"/>
									</div>
									<div class="col-md-6">
										<input-binding v-model="product.sale_price" name="sale_price" label="Sale Price"/>
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
				product: []
			}
		},
		methods: {
			async fetchCategory(slug){
				let ca = await axios.get(`products/categories`)
				let pr = await axios.get(`products/${slug}/variations`)

				this.product = pr.data.data
				this.categories = ca.data.data
			},

			onSuccess(response){
				this.$router.push({name: 'store-products-variation', params: {slug: response.data.data.slug}})
			}
		},
		computed: {
			...mapGetters({
				errors: 'getValidationErrors'
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
