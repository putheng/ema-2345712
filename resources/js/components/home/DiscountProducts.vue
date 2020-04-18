<template>
	<tiny-slider :mouse-drag="true" :loop="true" items="5" gutter="20" v-if="products.length">
		<discount-product v-for="(product, key) in products" :product="product" :key="key"/>
	</tiny-slider>
</template>

<script>
export default {
	props:[
		'endpoint'
	],

	data(){
		return {
			products: [],
		}
	},
	methods: {
		async fetchProduct(){
			let response = await axios.get(this.endpoint)

			this.products = response.data.data
		}
	},

	mounted(){
		this.fetchProduct()
	}
}
</script>

<style scoped>
	.btn-wishlist.exists{
		background-color: #f34770; 
	}
</style>