<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Account Summary</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					
					<div class="metric-row" v-if="data.purchase">
						<div class="col">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Purchase </h2>
								<p class="metric-value h1">
									<sup></sup> <span class="value">{{ data.purchase.counts }}</span>
									
								</p>
							</div>
						</div>
						<div class="col">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Expenses </h2>
								<p class="metric-value h1">
									<sup>$</sup> <span class="value">{{ data.purchase.expenses }}</span>
								</p>
							</div>
						</div>
						<div class="col">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Available Earnings </h2>
								<p class="metric-value h1">
									<sup>$</sup> <span class="value">{{ data.earning }}</span>
								</p>
							</div>
						</div>
					</div>

					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> Transaction <strong>History</strong> </h3>
							
							<div class="table table-responsive">
								<table class="table table-striped table-hovered">
									<thead>
										<th>Transaction ID</th>
										<th>Date</th>
										<th>Type</th>
										<th>Status</th>
										<th>Amount</th>
									</thead>

									<tbody>
										<tr v-if="data.transactions" v-for="tr in data.transactions">
											<td>{{ tr.id }}</td>
											<td>{{ tr.created }}</td>
											<td>{{ tr.type }}</td>
											<td>
												<span class="badge badge-success">
												Success</span>
											</td>
											<td>{{ tr.symbol }} {{ tr.value }}</td>
										</tr>
										<tr v-else>
											<td colspan="5">No transaction</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<h3 class="card-title"> Orders <strong>History</strong> </h3>
					<div class="card card-fluid">
						<div class="card-body" v-if="data.orders">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<th>Order #</th>
										<th>Product</th>
										<th>Date Purchased</th>
										<th>Status</th>
										<th>Total</th>
									</thead>
									<tbody>
										<tr v-if="data.orders" v-for="(order, i) in data.orders">
											<td>
												<a href="#" @click.prevent="showModal(order)">
													EMAO{{ order.id }}
												</a>
											</td>
											<td>
												<div>{{ order.products[0].product.name }} </div>
												<div v-for="(product, i) in order.products">
													{{i+1}}. <small>{{ product.type }} - {{ product.name }}</small>
												</div>
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
		</div>

		<OrderModal :order="order"/>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	import OrderModal from '../cart/partials/OrderModal'

	export default {
		data(){
			return {
				data: [],
				order: null
			}
		},
		components:{
			OrderModal
		},
		methods: {
			async fetch(){
				let r = await axios.get('sociaty/summary')

				this.data = r.data.data
			},
			showModal(order){
				this.order = order
				$('#orderModal').modal('show')
			}
		},
		computed: {
			//
		},
		created(){
			this.fetch()
		}
	}
</script>
