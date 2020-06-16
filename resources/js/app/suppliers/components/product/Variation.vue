<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">
					<span>Product Variation</span>

					<div class="float-right">
						<button @click.prevent="updateChange" class="btn btn-success btn-lg">
							<span v-if="createLoading" 
								class="spinner-border spinner-border-sm"
								role="status" aria-hidden="true"></span>
							Update
						</button>
					</div>
				</h1>
				
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid" v-for="(variation, index) in product.variations">
							<div class="card-body">

								<div class="row form-group col-md-2">
									<label>Name</label>

									<input type="text" class="form-control" v-model="index" :class="{'is-invalid': errors['variations.'+ index +'.name']}" disabled="">

									<div class="invalid-feedback" v-if="errors['variations.'+ index +'.name']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ errors['variations.'+ index +'.name'][0] }}
							        </div>
								</div>
								
								<div class="row" v-for="(option, key) in variation">
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Option</label>
											<input v-model="option.name" type="text" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.option']}">
											
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.option']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.option'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Price ({{ option.currency }})</label>
											<input v-model="option.pricex" type="number" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Sale Price ({{ option.currency }})</label>
											<input v-model="option.sale_pricex" type="number" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Sale Price include VAT + 10% ({{ option.currency }})</label>
											<input 
											:value="saleVat(option.sale_pricex)"
											type="number" 
											class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Company's Profit ({{ option.currency }})</label>
											<input 
											:value="comp(option.sale_pricex, option.pricex)"
											type="number" 
											class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Total sale Price ({{ option.currency }})</label>
											<input 
											:value="saleVat(option.sale_pricex)"
											type="number" 
											class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Profit in percent (%)</label>
											<input 
											:value="income(option.sale_pricex, option.pricex)"
											type="text" 
											class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Weight (g)</label>
											<input v-model="option.weight" type="number" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.weight']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.weight']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.weight'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Stock</label>
											<input v-model="option.stock" type="number" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.stock']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.stock']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.stock'][0] }}
									        </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12 text-right">
						<button class="btn btn-success btn-lg mb-2"  @click.prevent="saveChange" :disabled="loading">
							<span v-if="loading" 
								class="spinner-border spinner-border-sm"
								role="status" aria-hidden="true"></span>
							Create
						</button>
					</div>
					<div class="col-md-12">
						<div class="card card-fluid" v-for="(variation, index) in variations">
							<div class="card-body">
								<div class="row form-group col-md-2">
									<label>Name</label>
									<input type="text" class="form-control" v-model="variation.name" :class="{'is-invalid': errors['variations.'+ index +'.name']}">

									<div class="invalid-feedback" v-if="errors['variations.'+ index +'.name']">
							            <i class="fa fa-exclamation-circle fa-fw"></i>
							            {{ errors['variations.'+ index +'.name'][0] }}
							        </div>
								</div>
								
								<div class="row" v-for="(option, key) in variation.options">
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Option</label>
											<input v-model="option.option" type="text" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.option']}">
											
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.option']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.option'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Price ({{ user.currency }})</label>
											<input v-model="option.price" type="number" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Sale Price ({{ user.currency }})</label>
											<input v-model="option.sale_price" type="number" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Sale Price include VAT + 10% ({{ user.currency }})</label>
											<input 
											:value="saleVat(option.sale_price)"
											type="number" 
											class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Company's Profit ({{ user.currency }})</label>
											<input 
											:value="comp(option.sale_price, option.price)"
											type="number" 
											class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Total sale Price ({{ user.currency }})</label>
											<input 
											:value="saleVat(option.sale_price)"
											type="number" 
											class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Profit in percent (%)</label>
											<input 
											@keyup="recalculate($event, index, key, option.sale_price)"
											type="text" 
											class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.sale_price']}">

											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.sale_price']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.sale_price'][0] }}
									        </div>
										</div>
									</div>

									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Weight (g)</label>
											<input v-model="option.weight" type="number" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.weight']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.weight']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.weight'][0] }}
									        </div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label class="control-label">Stock</label>
											<input v-model="option.stock" type="number" class="form-control" :class="{'is-invalid': errors['variations.'+ index +'.options.'+ key +'.stock']}">
											<div class="invalid-feedback" v-if="errors['variations.'+ index +'.options.'+ key +'.stock']">
									            <i class="fa fa-exclamation-circle fa-fw"></i>
									            {{ errors['variations.'+ index +'.options.'+ key +'.stock'][0] }}
									        </div>
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
				createLoading: false,
				product: [],
				opt: [],
				price: 0,
				sale_price: 0,
				comission: 0,
				variations: [
					{
						name: '',
						options: [
							{
								option: '',
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

			recalculate(e, index, key, sale_price){
				let v = e.target.value
				let s = Number(sale_price)

				let t = s - (s * v) / 100
				
				this.variations[index].options[key].price = t

				
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

			async saveChange(){
				this.loading = true

				// if(this.product.variations.length != 0 && this.product.variations.length == undefined){
				// 	let r = await axios.post(`products/${this.$route.params.slug}/variations/edit`, {
				// 		variations: this.product.variations
				// 	})
				// }

				axios.post(`products/${this.$route.params.slug}/variations`, {
					variations: this.variations
				})
					.then((response) => {
						this.$router.push({name: 'suppliers-products'})
						this.loading = false
					})
					.catch((errors) => {
						this.loading = false
					})
			},
			async updateChange(){
				this.createLoading = true;

				let r = await axios.post(`products/${this.$route.params.slug}/variations/edit`, {
					variations: this.product.variations
				})

				this.createLoading = false;
			},
			saleVat(sale_price){
				return Number(sale_price) + (Number(sale_price) * 0.1)	
			},
			comp(sale_price, price){
				return Number(sale_price) - Number(price)
			},
			income(sale_price, price)
			{
				if(sale_price != 0){
					let p = (Number(sale_price) - Number(price)) / Number(price)

					let t = p * 100

					return t + '%'
				}
				return '0%'
			},
		},
		computed: {
			...mapGetters({
				errors: 'getValidationErrors',
				user: 'userData'
			}),
			newValue:{
				get(n){
					console.log(n)
				},
				set(n){
					console.log(n);
				}
			}
		},
		mounted(){
			this.fetchProduct(this.$route.params.slug)
		}
	}
</script>
