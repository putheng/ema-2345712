<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="TicketModal" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<app-form @created="created" action="/ticket">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							Submit new ticket
						</h5>
					</div>
					<div class="modal-body">
						<p>We normally respond tickets within 2 business days.</p>
						<br>

						<app-input name="subject" label="Subject"/>

						<div class="row">
							<div class="col-md-6">
								<AppSelect 
									:options="types"
									label="Type" name="type"/>
							</div>
							<div class="col-md-6">
								<AppSelect 
									:options="options" 
									label="Priority" name="priority"/>
							</div>
						</div>

						<app-text-area name="describe" label="Describe your issue"/>
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
							Submit Ticket
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
					{name: 'Partner request', value: '2'},
					{name: 'Complaint', value: '3'},
					{name: 'Info inquiry', value: '4'},
					{name: 'Delivery problem', value: '5'}
				],
				options: [
					{name: 'Urgent', value: '1'},
					{name: 'High', value: '2'},
					{name: 'Medium', value: '3'},
					{name: 'Low', value: '4'},
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
			},
			created(e){
				this.$emit('created', e)
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