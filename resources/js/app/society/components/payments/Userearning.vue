<template>
	<div class="page-inner">
		<header class="page-title-bar">
			<h1 class="page-title">User Earnings</h1>
		</header>
		<div class="page-section">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-fluid">
						<div class="card-body">
							<h3 class="card-title"> Level commissions </h3>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<th>#</th>
										<th>From</th>
										<th>Level</th>
										<th>Amount Type</th>
										<th>Amount</th>
										<th>Date</th>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>EMA000016</td>
											<td>2</td>
											<td>Sponsor commission</td>
											<td>$0.003</td>
											<td>10 April 2020</td>
										</tr>
										<tr>
											<td>2</td>
											<td>EMA000016</td>
											<td>1</td>
											<td>Downline commission</td>
											<td>$0.003</td>
											<td>10 April 2020</td>
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
