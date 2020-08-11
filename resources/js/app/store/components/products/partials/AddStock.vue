<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="AddStock" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h5 class="modal-title">
							{{ product.name }}
						</h5>
					</div>
					<div class="modal-body">
							<div class="form-group">
								<label class="col-form-label">Variations</label>
								<select class="form-control" @change="selected">
									<option>Select</option>
									<option :value="variation.id" v-for="(variation, key) in product.variations">
										{{variation.type}} - {{ variation.name }}
									</option>
								</select>
							</div>
							
							<div class="form-group">
								<label class="col-form-label">Stock Quantity</label>
								<input v-model="form.stock" type="number" class="form-control">
							</div>
						
					</div>
					<div class="modal-footer">
						<button :disabled="loadingStock" class="btn btn-primary" @click.prevent="updateQty">
							<span v-if="loadingStock">Updating ...</span>
							<span v-else>Update</span>
						</button>
						<button
							type="button"
							@click="resetLoading"
							class="btn btn-warning"
							data-dismiss="modal"
						>
							Cancel
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</transition>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		props: ['product'],
		data(){
			return {
				loadingStock: false,
				form: {
					id: '',
					stock: 5
				}
			}
		},

		computed: {
			...mapGetters({
				loading: 'getLoading',
				errors: 'getError'
			})
		},
		methods: {
			...mapActions({
				clearValidationErrors: 'clearValidationErrors',
				clearMessage: 'clearMessage',
				clearErrors: 'clearErrors'
			}),
			resetLoading(){
				this.loadingStock = false
				this.clearValidationErrors()
				this.clearMessage()
				this.clearErrors()
			},
			created(e){
				this.$emit('updated', e)
			},

			selected(e){
				this.form.id = e.target.value
			},

			async updateQty(){

				if(this.form.id == ''){
					alert('Please select a product variations.')
					return
				}

				if(this.form.stock == '' || this.form.stock < 1){
					alert('Stock quantity at least 1.')
					return
				}

				this.loadingStock = true

				await axios.post(`/products/${this.product.slug}/variations/stock`, this.form)
					.then((response) => {
						this.loadingStock = false

						alert(response.data.message)
					})
			}
		}
	}
</script>

<style scoped>

.slide-leave-active,
.slide-enter-active {
	transition: all 200ms;
}
.slide-enter {
	transform: translate(100%, 0);
}
.slide-leave-to {
	transform: translate(100%, 0);
}
</style>