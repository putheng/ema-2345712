<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">My wishlist</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-fluid">
					<div class="card-body">
						<h3 class="card-title"> List of items you added to wishlist:</h3>
						
						<div class="table-responsive" v-if="products.length">
							<table class="table">
								<tbody>
									<tr v-for="(product, key) in products">
										<td>
											<img width="100" :src="product.product.images[0].url" v-if="product.product.images">
										</td>
										<td>
											<a target="_blank" :href="'/product/'+ product.product.slug + '/show'">{{ product.product.name }}</a>
											<h5>{{ product.product.sale_price }}</h5>
										</td>
										<td>
											<button @click="removeWishlist(product.product.id)" class="btn btn-sm btn-outline-danger">
												<span class="oi oi-trash mr-1"></span> Remove
											</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<p v-else>No Products</p>
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
			async fetch(){
				let response = await axios.get(`products/wishlist`)

				this.products = response.data.data
			},


			async removeWishlist(id){
				let response = await axios.post(`products/wishlist/remove`, {
					product: id
				})

				this.products = response.data.data
			}
		},
		computed: {
			//
		},
		created(){
			this.fetch()
		}
	}
</script>
