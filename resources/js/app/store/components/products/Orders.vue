<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Orders</h1>
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
									<th>Items</th>
									<th>Date Purchased</th>
									<th>Status</th>
									<th>Total</th>
									<th>Actions</th>
								</thead>
								<tbody>
									<tr v-if="orders.length" v-for="(order, i) in orders">
										<td>
											<a href="#" @click.prevent="showModal(order)">
												EMAO{{ order.order.id }}
											</a>
										</td>
										<td>
											{{ order.product_variation.product.name }}
											( {{ order.product_variation.type }}
											{{ order.product_variation.name }} )

										</td>
										<td>{{ order.order.created_at }}</td>
										<td><span class="badge "
											:class="{
												'badge-warning': order.order.status == 'Pending',
												'badge-primary': order.order.status == 'Processing',
												'badge-danger': order.order.status == 'Payment failed',
												'badge-success': order.order.status == 'Completed',
											}"
											>{{ order.order.status }}</span></td>
										<td>{{ order.order.total }}</td>
										<td width="250">
											<div class="form-group">
												<label class="col-form-label">Type</label>
												 <select name="type" class="custom-select" 
												 	@change="updateStatus(order.order.id, $event.target.value)">
												 	<option value=""> Choose... </option> 
												 	<option :value="type.name" v-for="type in types">{{ type.name }} </option>
												 </select> 
											</div>
										</td>
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
				selected: '',
				orders: [],
				order: null,
				types:[
					{name: 'Pending', value: '1'},
					{name: 'Processing', value: '2'},
					{name: 'Shipping', value: '3'},
					{name: 'Payment failed', value: '4'},
					{name: 'Completed', value: '5'},
					{name: 'Finished', value: '6'},
					{name: 'Refund', value: '7'},
					{name: 'Cancellation', value: '8'},
				],
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get(`store/orders`)

				this.orders = r.data.data
			},
			showModal(order){
				// this.order = order
				// $('#orderModal').modal('show')
			},
			async updateStatus(order, e){
				
				let r = await axios.put(`store/orders/${order}`, {
					status: e
				})

				this.orders = r.data.data

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
