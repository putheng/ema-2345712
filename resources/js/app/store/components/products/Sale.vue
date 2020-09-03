<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Your sales / earnings</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
					
						<div class="metric-row">
							<div class="col">
								<div class="metric metric-bordered">
									<h2 class="metric-label text-center"> Earnings (after taxes) </h2>
									<p class="metric-value h1 text-center">
										<sup>$</sup> <span class="value">{{ data.thisMonth }}</span>
									</p>
									<h2 class="metric-label text-center"> Sales this month </h2>
								</div>
							</div>
							<div class="col">
								<div class="metric metric-bordered">
									<h2 class="metric-label text-center"> Your balance </h2>
									<p class="metric-value h1 text-center">
										<sup>$</sup> <span class="value">{{ data.balance }}</span>
									</p>
									<h2 class="metric-label text-center"> To be paid </h2>
								</div>
							</div>
							<div class="col">
								<div class="metric metric-bordered">
									<h2 class="metric-label text-center"> Lifetime earnings </h2>
									<p class="metric-value h1 text-center">
										<sup>$</sup> <span class="value">{{ data.lifetime }}</span>
									</p>
									<h2 class="metric-label text-center"> Based on list price </h2>
								</div>
							</div>
						</div>

						<!-- <div class="card card-fluid">
							<div class="card-body">
								<apexchart type=line height=350 :options="chartOptions" :series="series" />
							</div>
						</div> -->

						<div class="card card-fluid">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<th>Order #</th>
									<th>Items</th>
									<th>Date Purchased</th>
									<th>Status</th>
									<th>Quantity</th>
									<th>Total</th>
								</thead>
								<tbody>
									<tr v-if="orders.length" v-for="(order, i) in orders">
										<td>
											<!-- <a href="#" @click.prevent="showModal(order)"> -->
											{{ order.order.uuid }}
											<!-- </a> -->
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

										<td>{{ order.quantity }}</td>
										<td>{{ order.price }}</td>
										
									</tr>
								</tbody>
							</table>
						</div>
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
		components: {
			OrderModal
		},
		methods: {
			async fetch(){
				let r = await axios.get('store/sales')
				let or = await axios.get(`store/orders`)

				this.orders = or.data.data

				this.data = r.data.data
				this.series = r.data.data.series
			},

			calculatePrice(q, p){
				return (q * p)
			},

			showModal(order){
				this.openModal = true
				this.order = order
				$('#orderModal').modal('show')
			}
		},
		data(){
			return {
				data:[],
				orders: [],
				series: [],
				order: [],
				openModal: false,
        		chartOptions: {
        			chart: {
        				height: 350,
        				zoom: {
        					enable: false
        				}
        			},
        			dataLabels: {
        				enable: false
        			},
        			stroke: {
        				curve: 'straight'
        			},
        			title: {
        				text: 'Sales value, USD (This month)',
        				align: 'left'
        			},
        			grid: {
        				row: {
        					colors: ['#f3f3f3', 'transparent'],
        					opacity: 0.5
        				}
        			},
        			xaxis: {
        				categories: this.category,
        			}
        		}
			}
		},

		computed: {
			category(){
				let categories = []

				for(let i=0; i<31; i++){
					categories.push(i)
				}

				return categories
			}
		},
		mounted(){
			this.fetch()
		}
	}
</script>
