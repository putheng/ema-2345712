<template>
<transition name="fade">
	<div class="modal modal-alert fade" 
		id="updateCommission" data-backdrop="static" 
		tabindex="-1" role="dialog" aria-hidden="true"
	>
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<app-form @created="created" :action="'admin/store/'+ store.id +'/commission'">
					<div class="modal-header">
						<h5 class="modal-title">
							{{ store.store }}
						</h5>
					</div>
					<div class="modal-body">
						<input-binding v-model="store.store" name="store" label="Store name"/>
						<input-binding v-model="store.username" name="name" label="Username"/>
						<input-binding v-model="store.email" name="email" label="email"/>
						<input-binding v-model="store.phone" name="phone" label="Phone number"/>
						<input-binding v-model="store.address" name="address" label="Address"/>
					</div>
					<div class="modal-footer">
						<app-button type="submit">Update</app-button>
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
		props: ['store'],

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