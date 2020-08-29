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
						<h3 class="card-title"> Latest Order </h3>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<th>Order #</th>
									<th>Date Purchased</th>
									<th>Status</th>
									<th>Ship To</th>
									<th>Delivery</th>
									<th>Actions</th>
								</thead>
								<tbody>
									<tr v-for="order in orders">
										<td>
											<a href="#" @click.prevent="showModal(order)">
												{{ order.uuid }}
											</a>
										</td>
										<td>{{ order.created_at }}</td>
										<td>
											<span class="badge "
											:class="{
												'badge-warning': order.status == 'Pending',
												'badge-primary': order.status == 'Processing',
												'badge-danger': order.status == 'Payment failed',
												'badge-success': order.status == 'Completed',
											}"
											>{{ order.status }}</span>
										</td>
										<td>
											{{ order.address.name }}
											<div>
												{{ order.address.address }},
												{{ order.address.city.name }}
											</div>
											<div>
												{{ order.address.phone }}
											</div>
										</td>
										<td width="250">
											<div class="form-group">
												 <select name="type" class="custom-select" 
												 	@change="assignDriver(order.id, $event.target.value)">
												 	<option value=""> Choose... </option> 
												 	<option 
												 		:selected="driver.id == order.driver" 
												 		:value="driver.id" 
												 		v-for="driver in drivers">{{ driver.name }} </option>
												 </select> 
											</div>
										</td>
										<td width="250">
											<div class="form-group">
												 <select name="type" class="custom-select" 
												 	@change="updateStatus(order.id, $event.target.value)">
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
	</div>
	<OrderModal :order="order" v-if="openModal"/>
</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'
	import OrderModal from './partials/OrderModal'

	export default {
		data(){
			return {
				orders: [],
				order: [],
				drivers: [],
				openModal: false,
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
			async fetchOrders(){
				let r = await axios.get('admin/orders/processing')
				let d = await axios.get('admin/drivers')

				this.orders = r.data.data
				this.drivers = d.data
			},
			async updateStatus(order, e){
				
				let r = await axios.post(`admin/orders/${order}`, {
					status: e
				})

				this.orders = r.data.data

			},
			async assignDriver(order, e){
				let r = await axios.post(`admin/drivers`, {
					driver: e,
					order: order
				})
			},
			showModal(order){
				this.openModal = true
				this.order = order
				$('#orderModal').modal('show')
			}
		},
		components: {
			OrderModal
		},
		mounted(){
			this.fetchOrders()
		}
	}
</script>
