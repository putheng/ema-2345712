<template>
<transition name="fade">
	<div class="modal modal-alert fade" :id="id" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						Order No - 34VB5540K83
					</h5>
				</div>
				<div class="modal-body">
					<table class="table">
						<tbody>
							<tr>
								<td>
									<img width="100" src="https://demo.createx.studio/cartzilla/img/shop/cart/01.jpg">
								</td>
								<td>
									Women Colorblock Sneakers
									<div>Size: 8.5</div>
									<div>Color: White & Blue</div>
									<h5>$154.00</h5>
								</td>
								<td>Quantity: <br>1</td>
								<td>
									Subtotal:<br>
									$154.00
								</td>
							</tr>
							<tr>
								<td>
									<img width="100" src="https://demo.createx.studio/cartzilla/img/shop/cart/04.jpg">
								</td>
								<td>
									Cotton Polo Regular Fit
									<div>Size: 8.5</div>
									<div>Color: White & Blue</div>
									<h5>$154.00</h5>
								</td>
								<td>Quantity: <br>1</td>
								<td>
									Subtotal:<br>
									$154.00
								</td>
							</tr>

							<tr>
								<td>Subtotal: <div><b>$265.00</b></div> </td>
								<td>Shipping: <div><b>$22.50</b></div> </td>
								<td>Tax: <div><b>$9.50</b></div> </td>
								<td>Total: <div><h6>$297.00</h6></div> </td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">

					<button
						type="button"
						@click="resetLoading"
						class="btn btn-warning"
						data-dismiss="modal"
					>
						{{ cancel }}
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
		props: {
			id: {
				required: true
			},
			title: {
				required: true,
				type: String
			},
			option: {
				required: true,
				type: Object
			},
			data: {
				required: false,
				type: Object
			},
			cancel: {
				required: true,
				type: String
			},
			commit: {
				required: false,
				type: String
			},
			body: {
				required: false,
				type: String,
				default: 'Are you sure you want to delete this package ?'
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