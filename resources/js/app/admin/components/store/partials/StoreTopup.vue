<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="StoreTopup" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						{{ store.store }}
					</h5>
				</div>
				<div class="modal-body">
					<app-form action="/">
						<input-binding v-model="store.store" name="name" label="Store"/>
						<input-binding v-model="store.id" name="id" label="Store ID"/>
						<input-binding name="amount" label="Amount"/>
						<text-area-binding name="note" label="Note"/>
						<input-binding name="password" label="Password"/>
					</app-form>
				</div>
				<div class="modal-footer">

					<button
						type="button"
						@click="resetLoading"
						class="btn btn-warning"
						data-dismiss="modal"
					>
						Cancel
					</button>
				</div>
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