<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">E-Wallet Summary</h1>
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
							
							<div class="table-responsive">
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
				data: []
			}
		},
		methods: {
			async fetch(){
				let r = await axios.get('sociaty/summary')

				this.data = r.data.data
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
