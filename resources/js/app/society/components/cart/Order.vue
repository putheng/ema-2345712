<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">My orders</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-fluid">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<th>Order #</th>
									<th>Date Purchased</th>
									<th>Status</th>
									<th>Total</th>
								</thead>
								<tbody>
									<tr v-if="orders.length" v-for="(order, i) in orders">
										<td>
											<a href="#" @click.prevent="showModal(order)">
												EMAO{{ order.id }}
											</a>
										</td>
										<td>{{ order.created_at }}</td>
										<td><span class="badge "
											:class="{
												'badge-warning': order.status == 'pending',
												'badge-primary': order.status == 'processing',
												'badge-danger': order.status == 'payment_failed',
												'badge-success': order.status == 'completed',
											}"
											>{{ order.status }}</span></td>
										<td>{{ order.total }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<OrderModal :order="order"/>
	</div>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	import OrderModal from './partials/OrderModal'

	export default {
		data(){
			return {
				orders: [],
				order: null
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get(`orders`)

				this.orders = r.data.data
			},
			showModal(order){
				this.order = order
				$('#orderModal').modal('show')
			}
		},
		components: {
			OrderModal
		},
		created(){
			this.fetch()
		}
	}
</script>
