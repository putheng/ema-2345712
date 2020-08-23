<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">Transfer Details</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> Transfer history </h3>
							
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<th>#</th>
										<th>From</th>
										<th>To</th>
										<th>Amount</th>
										<th>Fee</th>
										<th>Date</th>
										<th>Mark</th>
									</thead>
									<tbody>
										<template v-if="transfers.length">
											<tr v-for="tran in transfers">
												<td>{{ tran.uuid }}</td>
												<td>{{ tran.sender }}</td>
												<td>{{ tran.receiver }}</td>
												<td>{{ tran.amount }}</td>
												<td>{{ tran.fee }}</td>
												<td>{{ tran.date }}</td>
												<td>{{ tran.mark }}</td>
											</tr>
										</template>
										<template v-else>
											<tr>
												<td colspan="7">
													<div class="text-center">No transaction</div>
												</td>
											</tr>	
										</template>
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
				transfers: []
			}
		},
		methods: {
			async fetchTransfers(){
				let response = await axios.get('payment/transfer')

				this.transfers = response.data.data
			}
		},
		computed: {
			//
		},
		mounted(){
			this.fetchTransfers()
		}
	}
</script>
