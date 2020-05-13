<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="StoreTopup" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-dialog" role="document">
		<form @submit.prevent="submit">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						{{ store.store }}
					</h5>
				</div>
				<div class="modal-body">
					<input-binding v-model="store.store" name="name" label="Store"/>
					<input-binding v-model="store.uuid" name="receiver" label="Store ID"/>
					<input-binding v-model="form.amount" name="amount" label="Amount"/>
					<text-area-binding v-model="form.note" name="note" label="Note"/>
					<input-binding v-model="form.password" name="password" type="password" label="Password"/>
				</div>
				<div class="modal-footer">
					<app-button type="submit">Send</app-button>
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
		</form>
		</div>
	</div>
</transition>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		props: ['store'],
		data(){
			return {
				form: {
					amount: '',
					note: '',
					password: '',
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
				this.clearValidationErrors()
				this.clearMessage()
				this.clearErrors()
			},
			async submit(){
				let r = await axios.post('admin/transfer', {
					name: this.store.store,
					uuid: this.store.uuid,
					amount: this.form.amount,
					password: this.form.password,
					fee: 0
				})

				this.$emit('created', r)
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