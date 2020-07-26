<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Cashier</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Products </h3>
								<div class="row">
									<div class="col-8">
										<div class="form-group">
											<label>Product</label>
											<select class="form-control" @change="productSelected">
												<option>Select</option>
												<option :value="product.slug" v-for="product in products">
													{{ product.name }}
												</option>
											</select>
										</div>

										<template v-for="(variation, index) in variations">
											<div class="form-group">
												<label>{{ index }}</label>
												<select class="form-control" @change="variationSelected">
													<option>Select</option>
													<option :value="item.id" v-for="item in variation">
														{{ item.name }} ({{ item.sale_price }})
													</option>
												</select>
											</div>
											
											<div class="form-group">
												<label>Qty</label>
												<select class="form-control">
													<option>1</option>
													<option>2</option>
													<option>3</option>
												</select>
											</div>
										</template>
									</div>
								</div>
								<div class="row mt-5">
									<div class="col">
										<table class="table table-bordered">
											<tr>
												<th>Product Name</th>
												<th>Category / Description</th>
												<th>Price</th>
												<th>Qty</th>
												<th>Subtotal</th>
												<th>Total</th>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td colspan="5" class="text-right">Subtotal</td>
												<td>0USD</td>
											</tr>
											<tr>
												<td colspan="5" class="text-right">VAT 10%</td>
												<td>0USD</td>
											</tr>
											<tr>
												<td colspan="5" class="text-right">Total</td>
												<td>0USD</td>
											</tr>
										</table>
									</div>
								</div>
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
				products: [],
				items: [],
				variations: [],
				variation: {}
			}
		},
		methods: {
			async fetchProducts(){
				let response = await axios.get(`products/product`)

				this.products = response.data.data
			},

			async productSelected(e){
				let value = e.target.value

				let r = await axios.get(`products/${value}/variations`)

				this.variations = r.data.data.variations
			},

			variationSelected(e){

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
