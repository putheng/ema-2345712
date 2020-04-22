<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Transactions</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> Transaction <strong>History</strong> </h3>
							
							<div class="table table-responsive">
								<table class="table table-hovered table-striped">
									<thead>
										<th>Transaction ID</th>
										<th>Date</th>
										<th>Type</th>
										<th>Status</th>
										<th>Amount</th>
									</thead>

									<tbody>
										<tr v-if="transactions" v-for="tr in transactions">
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
				transactions: []
			}
		},
		methods: {
			async fetch(){
				let response = await axios.get('transactions')

				this.transactions = response.data.data
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
