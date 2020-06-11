<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="UpateOwner" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<app-form @created="created" :action="'admin/product/'+ product.slug +'/owner'">
					<div class="modal-header">
						<h5 class="modal-title">
							{{ product.name }}
						</h5>
					</div>
					<div class="modal-body">
						
							
							<div class="form-group">
								<label class="col-form-label">Store Name</label>
								<input :value="product.store.name" type="text" class="form-control">
							</div>

							<div class="form-group">
								<label class="col-form-label">Store ID</label>
								<input :value="product.store.uuid" type="text" class="form-control">
							</div>

							<app-input value="ST000001" name="store" label="New Store ID"/>
						
					</div>
					<div class="modal-footer">
						<app-button type="submit">
							Update
						</app-button>
						<button
							type="button"
							@click="resetLoading"
							class="btn btn-warning"
							data-dismiss="modal"
						>
							Cancel
						</button>
					</div>
				</app-form>
			</div>
		</div>
	</div>
</transition>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		props: ['product'],

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
				this.clearValidationErrors()
				this.clearMessage()
				this.clearErrors()
			},
			created(e){
				this.$emit('updated', e)
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