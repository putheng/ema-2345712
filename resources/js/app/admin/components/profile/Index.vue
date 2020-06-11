<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Dashboard</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					<div class="metric-row">
						<div class="col" v-if="summary.transfer">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Transfers </h2>
								<p class="metric-value h1">
									<span class="value">{{ summary.transfer.count }}</span>
									
								</p>
							</div>
						</div>
						<div class="col" v-if="summary.society">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Society </h2>
								<p class="metric-value h1">
									<span class="value">{{ summary.society.count }}</span>
								</p>
							</div>
						</div>
						<div class="col" v-if="summary.product">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Product </h2>
								<p class="metric-value h1">
									<span class="value">{{ summary.product.count }}</span>
								</p>
							</div>
						</div>
						<div class="col" v-if="summary.sales">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Sale </h2>
								<p class="metric-value h1">
									<span class="value">{{ summary.sales.count }}</span>
								</p>
							</div>
						</div>
					</div>

					<div class="card card-fluid" v-if="summary.society">
						<div class="card-body">
							<h3 class="card-title"> Latest <strong>Society</strong> </h3>
							
							<div class="table table-responsive">
								<table class="table table-hovered table-striped">
									<thead>
										<th>Name</th>
										<th>Gender</th>
										<th>Phone</th>
										<th>Status</th>
									</thead>

									<tbody>
										<tr v-if="summary.society" v-for="tr in summary.society.society">
											<td>{{ tr.name }}</td>
											<td>
												<span>{{ tr.gender }}</span>
											</td>
											<td>{{ tr.phone }}</td>
											<td>{{ tr.status }}</td>
										</tr>
										<tr v-else>
											<td colspan="4">No Sale</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="card card-fluid" v-if="summary.sales">
						<div class="card-body">
							<h3 class="card-title"> Latest <strong>Sales</strong> </h3>
							
							<div class="table table-responsive">
								<table class="table table-hovered table-striped">
									<thead>
										<th>Product</th>
										<th>Quantity</th>
										<th>Amount</th>
									</thead>

									<tbody>
										<tr v-if="summary.sales" v-for="tr in summary.sales.sales">
											<td>{{ tr.product }}</td>
											<td>{{ tr.quantity }}</td>
											<td>{{ tr.amount }}</td>
										</tr>
										<tr v-else>
											<td colspan="4">No Sale</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="card card-fluid" v-if="summary.product">
						<div class="card-body">
							<h3 class="card-title"> Latest <strong>Products</strong> </h3>
							
							<div class="table table-responsive">
								<table class="table table-hovered table-striped">
									<thead>
										<th>Name</th>
										<th>Price</th>
										<th>Sale Price</th>
										<th>Stock</th>
									</thead>

									<tbody>
										<tr v-if="summary.product" v-for="tr in summary.product.products">
											<td>{{ tr.name }}</td>
											<td>{{ tr.price }}</td>
											<td>{{ tr.sale_price }}</td>
											<td>{{ tr.in_stock }}</td>
										</tr>
										<tr v-else>
											<td colspan="4">No product</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="card card-fluid" v-if="summary.transfer">
						<div class="card-body">
							<h3 class="card-title"> Latest <strong>Transfers</strong> </h3>
							
							<div class="table table-responsive">
								<table class="table table-hovered table-striped">
									<thead>
										<th>Transaction ID</th>
										<th>Date</th>
										<th>Amount</th>
										<th>Fee</th>
										<th>From</th>
										<th>To</th>
									</thead>

									<tbody>
										<tr v-if="summary.transfer" v-for="tr in summary.transfer.transfer">
											<td>{{ tr.uuid }}</td>
											<td>{{ tr.date }}</td>
											<td>{{ tr.amount }}</td>
											<td>{{ tr.fee }}</td>
											<td>{{ tr.sender }}</td>
											<td>{{ tr.receiver }}</td>
										</tr>
										<tr v-else>
											<td colspan="6">No transaction</td>
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
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		data(){
			return {
				summary: []
			}
		},
		methods: {
			async fetch(){
				let response = await axios.get('admin/summary')

				this.summary = response.data.data
			}
		},
		computed: {
			//
		},
		mounted(){
			this.fetch()
		}
	}
</script>
