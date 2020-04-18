<template>
<div>
	<div class="card product-card card-static pb-3">
		<span class="badge badge-danger badge-shadow">Sale</span>

		<button v-if="product.in_wishlist" @click.prevent="removeWishlist(product.id)" class="btn-wishlist exists btn-sm" type="button" 
			data-toggle="tooltip" data-placement="left" title="Add to wishlist">
			<i class="czi-heart"></i>
		</button>

		<button v-else @click.prevent="addWishlist(product.id)" class="btn-wishlist btn-sm" type="button" 
			data-toggle="tooltip" data-placement="left" title="Add to wishlist">
			<i class="czi-heart"></i>
		</button>

		<a class="card-img-top d-block overflow-hidden" :href="product.route">
			<img :src="product.image" alt="Product">
		</a>
		<div class="card-body py-2">
			<a class="product-meta d-block font-size-xs pb-1" href="#">
				{{ product.category.name }}
			</a>
			<h3 class="product-title font-size-sm">
				<a :href="product.route">{{ product.name }}</a>
			</h3>

			<div class="product-price">
				<span class="text-accent">{{ product.sale_price }}</span>
				<!-- <del class="font-size-sm text-muted">123</del> -->
			</div>
		</div>
		<!-- <div class="product-floating-btn">
			<button class="btn btn-primary btn-shadow btn-sm" type="button" data-toggle="toast" data-target="#cart-toast">+<i class="czi-cart font-size-base ml-1"></i></button>
		</div> -->
	</div>
</div>
</template>

<script>
export default {
	props: ['product'],

	data(){
		return {
		}
	},

	methods: {
		async addWishlist(id){
			let response = await axios.post(`products/wishlist`, {
				product: id
			})

			if(response.data.success){
				this.product.in_wishlist = true
			}
		},

		async removeWishlist(id){
			let response = await axios.post(`products/wishlist/remove`, {
				product: this.product.id
			})

			if(response.data.success){
				this.product.in_wishlist = false
			}
		}
	}
}
</script>

<style scoped>
	.btn-wishlist.exists{
		background-color: #f34770; 
		color: #ffffff;
	}
</style>