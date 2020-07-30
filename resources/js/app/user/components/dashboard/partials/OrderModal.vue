<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="orderModal" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content" v-if="order">
				<div class="modal-header">
					<h5 class="modal-title">
						Order No - EMAO{{ order.id }}
					</h5>

				</div>
				<div class="modal-body">
					
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr v-for="product in order.products">
									<td>
										<img width="100" :src="product.product.images[0].url">
									</td>
									<td>
										{{ product.product.name }} -
										{{ product.type }} {{ product.name }}
										<h5>{{ product.sale_price }}</h5>
									</td>
									<!-- <td>Quantity: <br>1</td> -->
									<!-- <td>
										Subtotal:<br>
										{{ order.subtotal }}
									</td> -->
								</tr>

								<tr>
									<td>Subtotal: <div><b>{{ order.subtotal }}</b></div> </td>
									<td>Shipping: <div><b>{{ order.shippingMethod.price }}</b></div> </td>
									<!-- <td>Tax: <div><b>$9.50</b></div> </td> -->
									<td>Total: <div><h6>{{ order.total }}</h6></div> </td>
								</tr>
								<tr>
									<td colspan="3">
										<div v-if="order.bank">{{ order.bank.bank_name }}: {{ order.bank.bank_ref }}</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">

					<button
						type="button"
						class="btn btn-warning"
						data-dismiss="modal"
					>
						Close
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
		props: ['order'],
		computed: {
			//
		},
		methods: {
			//
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