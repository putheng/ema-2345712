<template>
	<div class="page">
		<div class="page-inner">
			<header class="page-title-bar">
				<h1 class="page-title">Transactions</h1>
			</header>
			<div class="page-section">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-fluid">
							<div class="card-body">
								<h3 class="card-title"> Transactions </h3>
								<table class="table">
									<thead>
										<th>#</th>
										<th>User</th>
										<th>Amount</th>
										<th>S</th>
										<th>Trasaction Code</th>
										<th>Date</th>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Putheng</td>
											<td>$100</td>
											<td>EMAT00003</td>
											<td>Tuesday 21st of January 2020 05:45:19 PM</td>
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
