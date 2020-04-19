<template>
<div class="page">
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">
				Your products 
			</h1>
		</header>
		
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> 
								All Product 
								<small class="badge badge-subtle badge-info">{{ products.length }}</small>
							</h3>
							<table class="table">
								<tbody>
									<tr v-if="products.length" v-for="product in products">
										<td>
											<template v-if="product.images.length">
												<img width="100" :src="product.images[0].url">	
											</template>
											
										</td>
										<td>
											<h5>
												<a :href="'/product/'+ product.slug +'/show'" target="_blank">{{ product.name }}</a>
											</h5>
											<!-- <div>Sales: <strong>26</strong></div>
											<div>Earnings: <strong>$327.60</strong></div> -->
											<h5 class="text-info">{{ product.formattedPrice }}</h5>
										</td>
										<td>
											<router-link 
												:to="{name: 'store-products-edit', params:{slug: product.slug}}" 
												class="btn btn-sm btn-outline-info">
												<span class="oi oi-pencil mr-1"></span> Edit
											</router-link>
											<!-- <button class="btn btn-sm btn-outline-danger">
												<span class="oi oi-trash mr-1"></span> Remove
											</button> -->
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
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
				products: []
			}
		},
		methods: {
			async fetchProducts(){
				let response = await axios.get(`products/product`)

				this.products = response.data.data
			}
		},
		computed: {
			//
		},
		mounted(){
			this.fetchProducts()
		}
	}
</script>
