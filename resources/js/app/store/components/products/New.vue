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
				categories: []
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
			})
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
