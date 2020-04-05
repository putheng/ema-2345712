<template>
<div class="page-inner">
	<header class="page-title-bar">
		<h1 class="page-title">Payout</h1>
	</header>
	<div class="page-section">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-fluid">
					<div class="card-body" style="height: 150px">
						<h3 class="card-title"> <br>Next payout </h3>
						<p>
							Your current earnings of 
							<strong>$1,375.00</strong> 
							will be sent to you 8/15/2019
						</p>
						<br>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card card-fluid">
					<div class="card-body" style="height: 150px">
						<h3 class="card-title"><br> Payout method </h3>
						<div class="d-inline-block text-muted font-size-ms">
							<img width="70" src="/images/logos/aba_logo.png"> 
							<span>000 123 456</span>
						</div>
						<div class="d-inline-block text-muted font-size-ms border-left ml-2 pl-2">
							<button type="button" class="btn btn-sm btn-outline-danger">
								Change payout method
							</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<h5>Payout history</h5>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<th>Amount</th>
							<th>Payout method</th>
							<th>Date processed</th>
						</thead>
						<tbody>
							<tr>
								<td>$1,233.84</td>
								<td><strong>ABA</strong> 000 123 456</td>
								<td>July 16, 2020</td>
							</tr>
							<tr>
								<td>$1,233.84</td>
								<td><strong>ACLIDA</strong> 000 123 456</td>
								<td>July 16, 2020</td>
							</tr>
						</tbody>
					</table>
				</div>

				<hr>
				<nav class="d-md-flex justify-content-between align-items-center text-center text-md-left" aria-label="Page navigation">
					<div class="d-md-flex align-items-center w-75">
						<span class="font-size-sm text-muted mr-md-3">Showing 10 of 52 records</span>
						<div class="progress w-100 my-3 mx-auto mx-md-0" style="max-width: 10rem; height: 4px;">
							<div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<button class="btn btn-outline-primary btn-sm" type="button">More records</button>
				</nav>
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
