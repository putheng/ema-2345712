<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">
					<span>Product Variation</span>

					<button 
						class="btn btn-success btn-lg float-right" 
						@click.prevent="saveChange"
						:disabled="loading"
					>
						<span v-if="loading" 
							class="spinner-border spinner-border-sm"
							role="status" aria-hidden="true"></span>
						Save Changes
					</button>
				</h1>
				{{ errors }}
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid" v-for="(variation, index) in variations">
							<div class="card-body">
								<div class="row form-group col-md-3">
									<label>Name</label>
									<input type="text" class="form-control" v-model="variation.name">
								</div>
								
								<div class="row" v-for="(option, index) in variation.options">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Option</label>
											<input v-model="option.name" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">Price</label>
											<input v-model="option.price" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Sale Price</label>
											<input v-model="option.sale_price" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Weight (g)</label>
											<input v-model="option.weight" type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Stock</label>
											<input v-model="option.stock" type="number" class="form-control">
										</div>
									</div>
								</div>
								

								<div class="text-left">
									<button class="btn btn-warning" @click.prevent="addOption(variation.options)">Add Option</button>
								</div>
							</div>
						</div>

						<div class="">
							<button class="btn btn-primary" @click.prevent="addVariant">Add Variation</button>
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
				loading: false,
				variations: [
					{
						name: '',
						options: [
							{
								name: '',
								price: '',
								weight: '',
								sale_price: '',
								stock: 0
							}
						]
					}
				],
			}
		},
		methods: {
			async fetchProduct(slug){
				let response = await axios.get(`products/${slug}/variations`)

				this.product = response.data.data
			},

			addOption(option){
				option.push({
					name: '',
					price: '',
					weight: '',
					sale_price: '',
					stock: 0
				})
			},

			addVariant(){
				this.variations.push({
					name: '',
					options: [
						{
							name: '',
							price: '',
							weight: '',
							sale_price: '',
							stock: 0
						}
					]
				})
			},

			saveChange(){
				this.loading = true
				axios.post(`products/${this.$route.params.slug}/variations`, {
					variations: this.variations
				})
					.then((response) => {
						this.loading = false
					})
					.catch((errors) => {
						this.loading = false
					})
			}
		},
		computed: {
			...mapGetters({
				errors: 'getValidationErrors'
			})
		},
		mounted(){
			// this.fetchProduct(this.$route.params.slug)
		}
	}
</script>
