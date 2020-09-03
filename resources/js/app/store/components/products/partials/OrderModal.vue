<template>
<transition name="fade">
	<div class="modal modal-alert fade" id="orderModal" data-backdrop="static" tabindex="-1" role="dialog"aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content" v-if="order">
				<div class="modal-header">
					<h5 class="modal-title">
						Order No - {{ order.order.uuid }}
					</h5>
				</div>
				<div class="modal-body">
					<table class="table">
						<tbody>
							<tr>
								<td>
									<img width="100" :src="order.product_variation.product.images[0].url">
								</td>
								<td>
									{{ order.product_variation.product.name }} -
									{{ order.product_variation.type }} {{ order.product_variation.product.name }}
									<h5>{{ order.product_variation.product.sale_price }}</h5>
								</td>
							</tr>

							<tr>
								<td>Subtotal: <div><b>{{ order.order.subtotal }}</b></div> </td>
								<td>Shipping: <div><b>{{ order.order.shippingMethod.price }}</b></div> </td>
								<td>Total: <div><h6>{{ order.order.total }}</h6></div> </td>
							</tr>
						</tbody>
					</table>
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