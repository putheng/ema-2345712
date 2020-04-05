<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Transactions</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					
					<div class="metric-row">
						<div class="col">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Purchase </h2>
								<p class="metric-value h1">
									<sup></sup> <span class="value">20</span>
								</p>
							</div>
						</div>
						<div class="col">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Expenses </h2>
								<p class="metric-value h1">
									<sup>$</sup> <span class="value">3,600</span>
								</p>
							</div>
						</div>
						<div class="col">
							<div class="metric metric-bordered">
								<h2 class="metric-label"> Available Earnings </h2>
								<p class="metric-value h1">
									<sup>$</sup> <span class="value">450</span>
								</p>
							</div>
						</div>
					</div>

					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> Transaction <strong>History</strong> </h3>
							
							<div class="table table-responsive">
								<table class="table">
									<thead>
										<th>Transaction ID</th>
										<th>Date</th>
										<th>Type</th>
										<th>Status</th>
										<th>Amount</th>
									</thead>

									<tbody>
										<tr>
											<td>EMA00012345</td>
											<td>May 21, 2020</td>
											<td>Purchase</td>
											<td>
												<span class="badge badge-success">
												Success</span>
											</td>
											<td>- $358.75</td>
										</tr>
										<tr>
											<td>EMA00012345</td>
											<td>May 21, 2020</td>
											<td>Cash Back</td>
											<td>
												<span class="badge badge-success">
												Success</span>
											</td>
											<td>+ $3.75</td>
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
		methods: {
			//
		},
		computed: {
			//
		},
		mounted(){
			//
		}
	}
</script>
