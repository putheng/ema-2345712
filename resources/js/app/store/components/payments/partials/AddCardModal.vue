<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="AddCardModal" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<app-form action="/">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Add a payment method
						</h5>
					</div>
					<div class="modal-body">

						<app-input name="card_number" label="Card number" placeholder="xxxx xxxx xxxx xxxx"/>
						<app-input name="name" label="Card holder name" placeholder="Name on card"/>

						<div class="row">
							<div class="col-md-6">
								<app-input 
									name="expire" 
									label="Expiration date" placeholder="MM/YY"/>
							</div>
							<div class="col-md-6">
								<app-input name="cvc" label="Security code" placeholder="CVV"/>
							</div>
						</div>
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

						<app-button type="submit">
							Add payment method
						</app-button>
					</div>
				</div>
			</app-form>
		</div>
	</div>
</transition>
</template>

<script>
	import { mapActions, mapGetters } from 'vuex'

	export default {
		data(){
			return {
				types:[
					{name: 'Order problem', value: '1'},
					{name: 'Partner request', value: '1'},
					{name: 'Complaint', value: '1'},
					{name: 'Info inquiry', value: '1'},
					{name: 'Delivery problem', value: '1'}
				],
				options: [
					{name: 'Urgent', value: '1'},
					{name: 'High', value: '1'},
					{name: 'Medium', value: '1'},
					{name: 'Low', value: '1'},
				]
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