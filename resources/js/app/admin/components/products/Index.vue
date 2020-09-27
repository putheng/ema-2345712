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
							<div class="table-responsive">
								<table class="table">
									<tbody>
										<tr v-if="products.length" v-for="product in products">
											<td>
												<template v-if="product.image">
													<img width="100" :src="product.image">	
												</template>
												
											</td>
											<td class="min-width">
												<a :href="'/product/'+ product.slug +'/show'" target="_blank">{{ product.name }}</a>
												<h6 class="text-info">
													<span>{{ product.formattedPrice }}</span> |
													<span>{{ product.formattedSalePrice }}</span> |
													<span>{{ product.formattedTaxPrice }}</span>
												</h6>
												<div>
													<ul class="variation-list">
														<li v-for="(variation, key) in product.variations">
															<span class="text-xs" >
																{{variation.type}} : {{ variation.name }} 
																<span class="badge badge-warning">{{variation.stock_count}}</span>
															</span>
														</li>
													</ul>
												</div>
											</td>
											<td class="min-stock">
												<div class="form-group">
													<input :checked="product.in_stock" @change="addStockStatus(product)" :id="'discounted'+ product.slug" type="checkbox">
													<label :for="'discounted'+ product.slug">In Stock</label>
												</div>
											</td>
											<td class="min-discount">
												<div class="form-group">
													<input :checked="product.discounted" @change="addDiscounted(product)" :id="'discounted'+ product.slug" type="checkbox">
													<label :for="'discounted'+ product.slug">Discounted</label>
												</div>
											</td>
											<td class="min-best">
												<div class="form-group">
													<input :checked="product.bestsell" @change="addBest(product)" :id="'best'+ product.slug" type="checkbox">
													<label :for="'best'+ product.slug">Bestsell</label>
												</div>
											</td>
											<td class="text-center">
												<router-link 
													:to="{name: 'admin-products-edit', params:{slug: product.slug}}" 
													class="btn btn-sm btn-outline-info">Edit
												</router-link>
											</td>
											<td>
												<a href="#" @click.prevent="deletePro(product.slug)"
													class="btn btn-sm btn-outline-info">
													Delete
												</a>
											</td>
											<td>
												<a href="#" @click.prevent="addStock(product)" 
													class="btn btn-sm btn-outline-info">
													Stock
												</a>
											</td>
											<td>
												<a href="#" @click.prevent="updateOwner(product)"
													class="btn btn-sm btn-outline-info">
													Owner
												</a>
											</td>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

							<pagination :data="laravelData" @pagination-change-page="fetchProducts"></pagination>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<ChangeOwner v-if="isUpdating" :product="product" @updated="updated"/>
	<AddStock v-if="isAddStock" :product="product" @updated="updated"/>
	<Discounted v-if="discounted" :product="product" @updated="updated"/>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	import ChangeOwner from './partials/ChangeOwner'
	import AddStock from './partials/AddStock'
	import Discounted from './partials/Discounted'

	export default {
		data(){
			return {
				products: [],
				isUpdating: false,
				isAddStock: false,
				discounted: false,
				product: null,
				laravelData: {}
			}
		},
		methods: {
			async fetchProducts(page = 1){
				let response = await axios.get(`admin/products?page=${page}`)

				this.laravelData = response.data

				this.products = response.data.data
			},
			async deletePro(id){
				if(confirm('Are you sure to delete this product ?')){
					let r = await axios.delete(`admin/products/${id}`)

					this.products = r.data.data
				}
			},

			async addStockStatus(product){
				let r = await axios.put(`admin/products/${product.slug}`)
			},

			async addDiscounted(product){
				axios.post(`admin/discounted/${product.slug}`)
			},

			async addBest(product){
				axios.post(`admin/bestsell/${product.slug}`)
			},

			updated(e){
				if(e.data.success){
					$('#UpateOwner').modal('show')
				}
			},

			updateOwner(product){
				this.product = product
				this.isUpdating = true

				$('#UpateOwner').modal('show')
			},

			addProTo(product){
				this.product = product
				this.discounted = true

				$('#Discounted').modal('show')
			},

			addStock(product){
				this.product = product
				this.isAddStock = true

				$('#AddStock').modal('show')
			}

		},
		components: {
			ChangeOwner,
			Discounted,
			AddStock
		},
		mounted(){
			this.fetchProducts()
		}
	}
</script>


<style scoped>
	.min-width{min-width: 230px !important;}
	.min-stock{min-width: 100px;}
	.min-discount{min-width: 130px;}
	.min-best{min-width: 110px;}
	ul.variation-list {
    margin-left: 0;
    padding: 0;}

	h6{
    	font-size: 13px !important;
    	margin-bottom: 0 !important;
	}

	span.text-xs {
    	font-size: 12px;
	}
</style>